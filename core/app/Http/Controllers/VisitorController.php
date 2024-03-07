<?php

namespace App\Http\Controllers;



use App\blog;
use App\cardcategory;
use App\faqdetail;
use App\General;
use App\practisedetail;
use App\staticcontent;
use App\sucscribe;
use Auth;
use App\User;
use App\Social;
use App\Frontend;
use App\Seo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VisitorController extends Controller
{
    public function index()
    {

        $practs = practisedetail::all();

        $statuc = staticcontent::all();
        $faq = faqdetail::all();
        $faqs = faqdetail::all();
        $category = cardcategory::inRandomOrder()->take(6)->get();
        $blog = blog::where('status',0)->inRandomOrder()->take(3)->get();
        return view('fontend.index');
    }


    public function verification()
    {
        
        $pt = 'Email Verification';
        $metatag = '';
        if(Auth::user()->status == '1' && Auth::user()->emailv == 1 && Auth::user()->smsv == 1)
        {
            return redirect()->route('home');
        }
        else
        {
               return view('auth.verify', compact('pt','metatag'));
  
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::id());
        $chktm = $user->vsent+1000;
        if ($chktm > time())
        {
            $delay = $chktm-time();
            return back()->with('alert', 'Please Try after '.$delay.' Seconds');
        }
        else
        {
            $email = $request->email;
            $mobile = $request->mobile;
            $code = rand(100000, 999999);
            $msg = 'Your Verification code is: '.$code;
            $user['vercode'] = $code ;
            $user['vsent'] = time();
            $user->update();

            if(isset($email))
            {
                send_email($user->email, $user->username, 'Verification Code', $msg);
                return back()->with('msg', 'Email verification code sent successfully');
            }
            elseif(isset($mobile))
            {
                send_sms($user->mobile, $msg);
                return back()->with('msg', 'SMS verification code sent successfully');
            }
            else
            {
                return back()->with('alert', 'Sending Failed');
            }
          
        }

    }

    public function emailVerify(Request $request)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find(Auth::id());
        $code = $request->code;

        if ($user->vercode == $code)
        {
            $user['emailv'] = 1;
            $user['vercode'] = str_random(10);
            $user['vsent'] = 0;
            $user->save();

            return redirect()->route('home')->with('msg', 'Email Verified');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function smsVerify(Request $request)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find(Auth::id());
        $code = $request->code;

        if ($user->vercode == $code)
        {
            $user['smsv'] = 1;
            $user['vercode'] = str_random(10);
            $user['vsent'] = 0;
            $user->save();

            return redirect()->route('home')->with('msg', 'Mobile Number Verified');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }


    public function aboutpage()
    {
        $gnl = General::first();
        $pt = $gnl->about_heading;
        return view('fontend.about',compact( 'pt'));
    }

    public function contact()
    {
        $metatag = Seo::first()->metacontact;
        $pt = "Contact Us";
        return view('fontend.contact', compact('pt', 'metatag'));
    }


    public function sendmail(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'subject' => 'required',
           'message' => 'required',
        ]);


        $general = General::first();

        send_email($general->email,$request->name,$request->subject, $request->message);

         return redirect(route('contact'))->with('msg','Email Send Successfully');



    }


    public function subscribesave(Request $request)
    {
        $em = new sucscribe();
        $em->email = $request->email;
        $em->save();
        return back()->with('msg','Subscribe Successfully ');
    }

    public function blogdetails($id)
    {
        $blogdetails = blog::where('id',$id)->first();
        $pt = "Blog Detail";
        return view('fontend.blogdetails',compact('blogdetails', 'pt'));
    }

    public function blogde()
    {
        $blog = blog::where('status',0)->paginate(12);
        $pt = "Blog List";
        return view('fontend.blog',compact('blog','pt'));
    }




                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */
                            /* FORGET PASSWORD */



                            public function resetpage()
                            {

                                session()->forget('email');
                                session()->forget('otpstat');


                                $pt = "Reset Password";
                                $metatag =Seo::first()->metaforgetpass;
                                return view('auth.reset',compact('metatag', 'pt'));
                            }

                            public function otppage(Request $request)
                            {  

                                if(session('email')==NULL){
                                    
                                    return redirect()->route('password.resetreq')->with('success', 'Password changed successfully');
                                }

                                $pt = "Enter OTP";
                                $metatag =Seo::first()->metaforgetpass;
                                return view('auth.otp',compact('metatag', 'pt'));

                            }


                            public function passpage(Request $request)
                            {

                                if(session('otpstat')!='1'){
                                    return redirect()->route('password.resetreq')->with('success', 'Password changed successfully');
                                }
                              
                                $pt = "Change Password";
                                $metatag =Seo::first()->metaforgetpass;
                                return view('auth.passchange',compact('metatag', 'pt'));
                            }





                           






                            public function sendEmailpost(Request $request)
                            {
                                $this->validate($request,[
                                    'email' => 'required|email',
                                 ]);

                               

                               $user = User::where('email', $request->email)->first();
                               if(!$user){
                                    return redirect()->back()->with('error', 'No user found with this email');
                               }else{
                                    session(['otptry' =>  0]);
                                    session(['email' =>  $request->email]);
                                    $userVertime = Carbon::parse($user->vertime);
                                    $currentDateTime = Carbon::now();
                                    

                                    if ($userVertime->diffInMinutes($currentDateTime) >= 2) {
                                        
                                        $vercode = rand(100000, 999999);

                                        // Set the vercode and vertime columns
                                        $user->update([
                                            'vercode' => $vercode,
                                            'vertime' => Carbon::now(),
                                        ]);



                                        $data = [
                                            
                                            
                                            'title' => 'Forget Password', 
                                            'content' => 'Your OTP for password reset is: <b>'.$vercode.'</b>', 
                                    
                                    ]; // Replace 'content' with the actual key for your data
                                        $user['to'] = $request->email;
                                    
                                        Mail::send('mail', $data, function($message) use ($user) {
                                            $message->to($user['to']);
                                            $message->subject('Forget Password');
                                        });

                                    return redirect()->route('password.otppage');
                                     
                                    } else {
                        
                                        return redirect()->back()->with('error', 'Please wait 2 minute before sending a new email');
                                    }
                                
                               }

                            }





                  



                            public function sendotppost(Request $request)
                            {

                              
                                session(['otptry' =>  session('otptry')+1]);
                      

                                if(session('otptry')>=5){
                                    session(['otptry' =>  0]);
                                    return redirect()->route('login')->with('error', 'Too many failed attempt. Please try again later');
                                }
                                

                                $pt = "Change Password";
                                $metatag =Seo::first()->metaforgetpass;

                               $user = User::where('email', session('email'))->first();

                               if(!$user){
                               // return redirect()->back()->with('error', 'No user found with this email');
                               }else{



                                  if($request->otp == $user['vercode']){
                                    session(['otpstat' => '1']);
                                    
                                    return redirect()->route('password.passpage');
                                  }else{
                                    return redirect()->route('password.otppage')->with('error', 'OTP Code mismatch');
                                  }
                                
                               }

                            }






                            public function passchangereq(Request $request)
                            {

                                if(session('otpstat')!='1'){
                                    return redirect()->route('password.resetreq')->with('success', 'Password changed successfully');
                                }
                               $user = User::where('email', session('email'))->first();

                               if(!$user){
                                return redirect()->back()->with('error', 'No user found with this email');
                               }else{

                                    if($request->password == $request->password_conf) {
                                        $user->update(['password' => bcrypt($request->password)]);
                                         session()->forget('email');
                                         session()->forget('otpstat');
                                        return redirect('login')->with('success', 'Password changed successfully');
                                    }else{
                 
                                        return redirect()->route('password.passpage')->with('error', 'Confirmation password mismatch');
                        
                                    }
                                  
                                  
                                
                               }

                            }




                            
                        



}
