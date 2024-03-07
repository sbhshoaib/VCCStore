<?php

namespace App\Http\Controllers;

use App\Allheader;
use App\blog;
use App\card;
use App\cardcategory;
use App\cardsubcategory;
use App\CardRequest;
use App\clientimage;
use App\sucscribe;

use Auth;
use App\User;
use App\Admin;
use App\CardTrans;
use App\Deposit;
use App\DepositData;
use App\Gateway;
use App\General;
use App\Loginpage;
use App\Notices;
use App\PaymentG;
use App\Seo;
use App\Withdraw;
use App\Transaction;
use App\WithdrawData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    
    
    public function adminlogintouser($id){
        
        
$user = User::find($id);

if ($user) {
 
    if (Auth::guard('web')->login($user)) {
return redirect()->back();
      
    } else {
    return redirect()->route('home');
        
    }
} else {

    return redirect()->back()->with('error', 'User not found');
}



  
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('alert', 'Username and Password Not Matched');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->intended(route('admin.login'));
    }


    public function seo() {
        $data = Seo::first();
        return view('admin.seo', compact('data'));
    }
    public function seoupdate(Request $request) {
        $data =  $request->except('_token');

        if (Seo::first()->update($data)) {
            return redirect()->back()->with('success', 'Seo Updated SUccessfully');
        }
    
            return redirect()->back()->with('error', 'Failed to update');
    }

    public function loginpage() {
        $data = Loginpage::first();
        return view('admin.loginpage', compact('data'));
    }
    public function loginpageupdate(Request $request) {
        $data =  $request->except('_token');

        if (Loginpage::first()->update($data)) {
            return redirect()->back()->with('success', 'loginpage Updated SUccessfully');
        }
    
            return redirect()->back()->with('error', 'Failed to update');
    }



    
    public function coinbasecred() {
        $data = PaymentG::first();
        return view('admin.coinbasecred', compact('data'));
    }
    public function coinbasecredpost(Request $request) {
        $data =  $request->except('_token');

        if (PaymentG::first()->update($data)) {
            return redirect()->back()->with('success', 'Credential Updated SUccessfully');
        }
    
            return redirect()->back()->with('error', 'Failed to update');
    }



    public function dashboard()
    {
        $users = User::where('status', 1)->count();
        $deposit = DepositData::where('status', 1)->count();
        $cat = cardcategory::count();
        $subcat = cardsubcategory::count();
        $cardreq = CardRequest::count();
        $cardtrans = CardTrans::count();
        $trans = Transaction::count();
        $dvcard = User::sum('tcard');
        $totaldepo = User::sum('totaldeposit');
        $gate = Gateway::count();
        $pt = 'DASHBOARD';


        $play =  card::where('user_id', '!=', 0)->whereMonth('created_at', '=', date('m'))->get()->groupBy(function ($d) {
            return $d->created_at->format('Y-m-d');
        });

        $monthly_play = [];
        $js = '';
        foreach ($play as $key => $value) {
            $js .= collect([
                'y' => $key,
                'a' => $value->count('id')
            ])->toJson() . ',';
        }
        $monthly_play = '[' . $js . ']';

        return view('admin.dashboard', compact('monthly_play', 'gate',  'deposit' , 'subcat', 'cardreq', 'cardtrans', 'trans' , 'dvcard', 'totaldepo', 'cat', 'users', 'deposit', 'pt'));
    }



    public function notices()
    {
        $notice = Notices::paginate(10);
        return view('admin.notice', compact('notice'));
    }

    public function noticestore(Request $request)
    {
        $data = ['title' => $request->title,
                  'status' => $request->status];

        if(Notices::create($data)) {
            return redirect()->back()->with('success', 'Notice created Successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    public function noticeupdate(Request $request, $id)
    {

        $data = ['title' => $request->title,
                'status' => $request->status];
       
        if(Notices::find($id)->update($data)) {
            return redirect()->back()->with('success', 'Notice Updated Successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    public function noticedelete($id)
    {

        if(Notices::find($id)->delete()) {
            return redirect()->back()->with('success', 'Notice Deleted Successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to delete');
        }
       
    }

    



    public function general()
    {
        $general = General::first();
        if (is_null($general)) {
            $default = [
                'title' => 'AniMex Dev',
                'subtitle' => 'Subtitle',
                'color' => '009933',
                'cur' => 'BDT',
                'cursym' => 'TK',
                'decimal' => 2,
                'reg' => 1,
                'emailver' => 0,
                'smsver' => 1,
                'emailnotf' => 0,
                'smsnotf' => 1
            ];
            General::create($default);
            $general = General::first();
        }
        $pt = 'GENERAL SETTINGS';

        return view('admin.website.general', compact('general', 'pt'));
    }

    public function generalUpdate(Request $request)
    {
        $general = General::first();

        $this->validate(
            $request,
            [
                'title' => 'required',
                'subtitle' => 'required',
                'cur' => 'required',
                'cursym' => 'required',

            ]
        );

        $general['title'] = $request->title;
        $general['subtitle'] = $request->subtitle;
        $general['cur'] = $request->cur;
        $general['mincard'] = $request->mincard;
        $general['mindepo'] = $request->mindepo;
        $general['minwith'] = $request->minwith;
        $general['minreload'] = $request->minreload;
        $general['mincwith'] = $request->mincwith;
        $general['depositfee'] = $request->depositfee;
        $general['withfee'] = $request->withfee;
        $general['reloadfee'] = $request->reloadfee;
        $general['cwithfee'] = $request->cwithfee;
        $general['cursym'] = $request->cursym;
        $general['reg'] = $request->reg == "1" ? 1 : 0;
        $general['emailver'] = $request->emailver == "1" ? 0 : 1;
        $general['smsver'] = $request->smsver == "1" ? 0 : 1;
        $general['emailnotf'] = $request->emailnotf == "1" ? 1 : 0;
        $general['smsnotf'] = $request->smsnotf == "1" ? 1 : 0;
        $general->update();

        return back()->with('success', 'General Settings Updated Successfully!');
    }


    public function logoIcon()
    {
        $pt = 'LOGO & ICON SETTINGS';
        return view('admin.website.logo', compact('pt'));
    }

    public function logoUpdate(Request $request)
    {
        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg|max:4048',
            'icon' => 'image|mimes:jpeg,png,jpg|max:4048',
            'bread' => 'image|mimes:jpeg,png,jpg|max:8048',
        ]);

        if ($request->hasFile('logo')) {
            Image::make($request->logo)->save('assets/images/logo/logo.png');
        }
        if ($request->hasFile('icon')) {
            Image::make($request->icon)->save('assets/images/logo/icon.png');
        }


        return back()->with('success', 'Logo and Icon Updated successfully.');
    }

    public function emailSms()
    {
        $temp = General::first();
        $pt = 'TEMPLATE SETTINGS';
        return view('admin.website.template', compact('temp', 'pt'));
    }

    public function emailUpdate(Request $request)
    {
        $temp = General::first();

        $this->validate($request, ['email' => 'email']);

        $temp['email'] = $request->email;
        $temp['template'] = $request->template;
        $temp['smsapi'] = $request->smsapi;
        $temp->save();

        return back()->with('success', 'Email and SMS Settings Updated Successfully!');
    }

    public function userIndex()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        $pt = 'USER LIST';
        return view('admin.users.index', compact('users', 'pt'));
    }

    public function userSearch(Request $request)
    {
        $this->validate($request, ['search' => 'required']);

        $users = User::where('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->get();
        $key = $request->search;
        $pt = 'USER SEARCH RESULT';
        return view('admin.users.search', compact('users', 'key', 'pt'));
    }

    public function singleUser($id)
    {
        $user = User::findOrFail($id);
        $pt = $user->name;
        return view('admin.users.single', compact('user', 'pt'));
    }

    public function email($id)
    {
        $user = User::findorFail($id);
        $pt = 'SEND EMAIL';
        return view('admin.users.email', compact('user', 'pt'));
    }

    public function sendemail(Request $request)
    {
        $this->validate(
            $request,
            [
                'emailto' => 'required|email',
                'reciver' => 'required',
                'subject' => 'required',
                'emailMessage' => 'required'
            ]
        );
        $to = $request->emailto;
        $name = $request->reciver;
        $subject = $request->subject;
        $message = $request->emailMessage;

        send_email($to, $name, $subject, $message);

        return back()->withSuccess('Mail Sent Successfuly');
    }

    public function broadcast()
    {
        $pt = 'BROADCAST EMAIL';
        return view('admin.users.broadcast', compact('pt'));
    }

    public function broadcastemail(Request $request)
    {
        $this->validate($request, ['subject' => 'required', 'emailMessage' => 'required']);

        $users = User::where('status', '1')->get();

        foreach ($users as $user) {

            $to = $user->email;
            $name = $user->name;
            $subject = $request->subject;
            $message = $request->emailMessage;

            send_email($to, $name, $subject, $message);
        }

        return back()->withSuccess('Mail Sent Successfuly');
    }

    public function userPasschange(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, ['password' => 'required|string|min:6|confirmed']);
        if ($request->password == $request->password_confirmation) {
            $user->password = Hash::make($request->password);
            $user->save();

            $msg =  'Password Changed By Admin. New Password is: ' . $request->password;
            send_email($user->email, $user->username, 'Password Changed', $msg);
            $sms =  'Password Changed By Admin. New Password is: ' . $request->password;
            send_sms($user->mobile, $sms);

            return back()->with('success', 'Password Changed');
        } else {
            return back()->with('alert', 'Password Not Matched');
        }
    }

    public function statupdate(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'mobile' => 'required|string|max:255',
            ]
        );

        $user['name'] = $request->name;
        $user['mobile'] = $request->mobile;
        $user['email'] = $request->email;
        $user['status'] = $request->status == "1" ? 1 : 0;
        $user['emailv'] = $request->emailv == "1" ? 1 : 0;
        $user['smsv'] = $request->smsv == "1" ? 1 : 0;
        $user['tauth'] = $request->tauth == "1" ? 1 : 0;

        $user->save();

        $msg =  'Your Profile Updated by Admin';
        send_email($user->email, $user->username, 'Profile Updated', $msg);
        $sms =  'Your Profile Updated by Admin';
        send_sms($user->mobile, $sms);

        return back()->withSuccess('User Profile Updated Successfuly');
    }

    public function bannedUser()
    {
        $users = User::where('status', '0')->orderBy('id', 'desc')->paginate(10);
        $pt = 'BANNED USERS';
        return view('admin.users.banned', compact('users', 'pt'));
    }

    public function gateway()
    {
        $gateways = Gateway::all();
        $pt = 'PAYMENT GATEWAY';
        return view('admin.website.gateway', compact('gateways', 'pt'));
    }

    public function gatewayCreate(Request $request)
    {
        $this->validate($request, [
            'gateimg' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required'
        ]);

        if ($request->hasFile('gateimg')) {
            $gateway['gateimg'] = uniqid() . '.' . $request->gateimg->getClientOriginalExtension();
            $path = 'assets/images/gateway/' . $gateway['gateimg'];
            Image::make($request->gateimg)->resize(200, 200)->save($path);
        }

        $gateway['name'] = $request->name;
        $gateway['val1'] = $request->val1;
        $gateway['status'] = $request->status;
        Gateway::create($gateway);

        return back()->with('success', 'Gateway Created successfully');
    }

    public function gatewayUpdate(Request $request, Gateway $gateway)
    {
        $this->validate($request, [
            'gateimg' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
        ]);

        if ($request->hasFile('gateimg')) {
            $path = 'assets/images/gateway/' . $gateway->gateimg;

            if (file_exists($path)) {
                unlink($path);
            }
            $gateway['gateimg'] = uniqid() . '.' . $request->gateimg->getClientOriginalExtension();
            $npath = 'assets/images/gateway/' . $gateway['gateimg'];
            Image::make($request->gateimg)->resize(200, 200)->save($npath);
        }

        $gateway['name'] = $request->name;
        $gateway['val1'] = $request->val1;
        $gateway['rate'] = $request->rate;
        $gateway['status'] = $request->status;
        $gateway->update();

        return back()->with('success', 'Gateway Information Updated Successfully');
    }



    public function depoApprove(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit['status'] = 1;
        $deposit->update();

        $user = User::findOrFail($deposit->user_id);
        $user['balance'] = $user->balance + $deposit->amount;
        $user->save();

        $tlog['user_id'] = $user->id;
        $tlog['amount'] = $deposit->amount;
        $tlog['balance'] = $user->balance;
        $tlog['type'] = 1;
        $tlog['details'] = 'Deposit via ' . $deposit->gateway->name;
        $tlog['trx'] = str_random(10);
        Transaction::create($tlog);

        return back()->with('success', 'Deposit Approved Successfully');
    }

    public function depoCancel(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit['status'] = 2;
        $deposit->update();

        return back()->with('success', 'Deposit Canceled Successfully');
    }


    public function withdrawLog()
    {
        $logs = Withdraw::where('status', 1)->paginate(20);
        $pt = 'WITHDRAW LOG';
        return view('admin.users.withlog', compact('logs', 'pt'));
    }
    public function withdrawApprove(Request $request, $id)
    {
        $withd = Withdraw::findOrFail($id);
        $withd['status'] = 1;
        $withd->update();

        return back()->with('success', 'Withdraw Approved Successfully');
    }
    public function withdrawCancel(Request $request, $id)
    {
        $withd = Withdraw::findOrFail($id);
        $withd['status'] = 2;
        $withd->update();

        $user = User::find(Auth::id());
        $user['balance'] = $user->balance + $withd->amount;
        $user->update();


        $tlog['user_id'] = $user->id;
        $tlog['amount'] = $withd->amount;
        $tlog['balance'] = $user->balance;
        $tlog['type'] = 1;
        $tlog['details'] = 'Withdraw Canceled';
        $tlog['trx'] = str_random(10);
        Transaction::create($tlog);

        return back()->with('success', 'Withdraw Canceled Successfully');
    }

    public function changePassword()
    {
        $pt = 'CHANGE PASSWORD';
        return view('admin.auth.changepass', compact('pt'));
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (Hash::check($request->passwordold, $admin->password) && $request->password == $request->password_confirmation) {
            $admin['password'] =  Hash::make($request->password);
            $admin->save();
            return back()->with('success', 'Password Changed');
        } else {
            return back()->with('alert', 'Password Not Changed');
        }
    }
    public function newAdmin()
    {
        $pt = 'NEW ADMIN REGISTRATION';
        return view('admin.auth.newadmin', compact('pt'));
    }

    public function listAdmin()
    {
        $admins = Admin::all();
        $pt = 'ADMIN LIST';
        return view('admin.auth.adminlist', compact('admins', 'pt'));
    }

    public function createAdmin(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:191',
                'email' => 'required|string|email|max:191|unique:admins',
                'username' => 'required|string|max:191|unique:admins|alpha_dash',
                'password' => 'required|string|min:5|confirmed',
            ]
        );

        $admin['name'] = $request->name;
        $admin['email'] = $request->email;
        $admin['username'] = $request->username;
        $admin['password'] = Hash::make($request->password);
        Admin::create($admin);

        return back()->with('success', 'New Admin Created Successfully');
    }



    public function cardcategory()
    {
        $all_cat = cardcategory::paginate(10);
        return view('admin.card.cardcategory', compact('all_cat'));
    }

    public function cardcategorystore(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $cat = new cardcategory();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time();
            $directory = 'assets/images/categoryimage/';
            $imgUrl  = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $cat->image = $imgUrl;
        }

        $cat->cat_name = $request->cat_name;
        $cat->save();
        return back()->with('success', 'Card Category Created Successfully');
    }


    public function cardcategoryupdate(Request $request)
    {
        $cardupdate = cardcategory::find($request->id);

        if ($request->hasFile('image')) {
            @unlink($cardupdate->image);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName('image');
            $directory = 'assets/images/categoryimage/';
            $imgUrl  = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $cardupdate->image = $imgUrl;
        }

        $cardupdate->cat_name = $request->cat_name;
        $cardupdate->status = $request->status;
        $cardupdate->save();
        return back()->with('success', 'Card Category Updated Successfully');
    }










    public function cardsubcategory()
    {
       $subcat = cardsubcategory::whereIn('status', [1, 0])->paginate(10);

        $cate = cardcategory::whereStatus(1)->get();
        return view('admin.card.subcardcategory', compact('subcat', 'cate'));
    }

    public function cardsubcategorystore(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'name' => 'required|unique:cardsubcategories,name',
        ], [
            'name.unique' => 'The bin number already added.',
        ]);
        

        $in = $request->except('_token');
        $in['status'] = 1;
        cardsubcategory::create($in);

        return redirect()->back()->with('success', 'Created Successfully');
    }
    
    
        public function cardsubcategoryhide($id)  //Not implemented
    {
          cardsubcategory::whereId($id)->update($in);

        return redirect()->back()->with('success', 'Deleted Successfully');
    }


    public function cardsubcategoryupdate(Request $request, $id)
    {
        $this->validate($request, [
            'cat_id' => 'required',
        //    'name' => 'required',
        ]);
        $in = $request->except('_token', '_method');

        cardsubcategory::whereId($id)->update($in);

        return back()->with('success', 'Updated Successfully');
    }

    public function cardsubcategorydelete($id)
    {

        cardsubcategory::whereId($id)->delete();

        return back()->with('success', 'Deleted Successfully');
    }






    /***************************************
     *          CARD REQUEST START
     *          CARD REQUEST START
     *          CARD REQUEST START
     */



     public function cardtransactions()
    {
        $subcat = CardTrans::orderBy('created_at', 'desc')->paginate(10);
        $cate = cardcategory::whereStatus(1)->get();
        return view('admin.card.transactions', compact('subcat', 'cate'));
    }

    public function cardtransactionsstore(Request $request)
    {
        
        $card = CardRequest::find($request->card_id);


            if($request->type=='deposit'){
               
                    $cardtr['u_id'] = $card->u_id;
                    $cardtr['card_id'] = $request->card_id;
                    $cardtr['details'] = 'External Card Credit';
                    $cardtr['type'] = '+';
                    $cardtr['trx'] = $request->trx;
                    $cardtr['amount'] = $request->amount;
                    $cardtr['postbalance'] = $card->balance+$request->amount;
                    $cardtr['price'] = 0;
                    $cardtr['category'] = 'externaldeposit';
                    $cardtr['message'] = $request->message;
                    $cardtr['status'] = '1';

                    CardTrans::create($cardtr);
        
                    $card->update(
                        ['balance'=>$card->balance+$request->amount]
                    );

                    return back()->with('success', 'Transaction added successfully');
            }elseif($request->type=='substract'){
                    $cardtr['u_id'] = $card->u_id;
                    $cardtr['card_id'] = $request->card_id;
                    $cardtr['details'] = 'External Card Charge';
                    $cardtr['type'] = '-';
                    $cardtr['trx'] = $request->trx;
                    $cardtr['amount'] = $request->amount;
                    $cardtr['postbalance'] = $card->balance-$request->amount;
                    $cardtr['price'] = 0;
                    $cardtr['category'] = 'externaldebit';
                    $cardtr['message'] = $request->message;
                    $cardtr['status'] = '1';
                    CardTrans::create($cardtr);

                    $card->update(
                        ['balance'=>$card->balance-$request->amount]
                    );






                    
                    return back()->with('success', 'Transaction added successfully');
            }else{
                return back()->with('error', 'Unknown Type');
            }
    }


    public function cardtransactionsdelete($id)
    {
         CardRequest::find($id)->delete();
    }


    public function cardrequest()
    {
        $subcat = CardRequest::orderBy('created_at', 'desc')->paginate(10);
        $cate = cardcategory::whereStatus(1)->get();
        return view('admin.card.request', compact('subcat', 'cate'));
    }


    public function carddeactive()
    {
        $subcat = CardRequest::orderBy('created_at', 'desc')
        ->whereIn('status', [4, 5, 7])
        ->paginate(10);
        $cate = cardcategory::whereStatus(1)->get();
        return view('admin.card.deactivation', compact('subcat', 'cate'));
    }


    public function carddeactivateprocess(Request $request, $id){


                  $cardupdate = $request->except('_token', '_method'); //will_get_message

                 $carddata = CardRequest::find($id);

                 
                if($carddata->status=='7'){  //Activation Pending
                    $cardupdate['status'] = '1'; //Activated;
                    $carddata->update($cardupdate);


                    $user = User::find($carddata->u_id);
                    $usersend['to'] = $user->email;
                    $usersend['title'] = 'Card activated'; 


                    $maildata = [                        
                        'title' => $usersend['title'], 
                        'content' => 'We activated your card. <br> Card Number: <b>'.$carddata['number'].' </b>', 
                    ]; 
                    Mail::send('mail', $maildata, function($message) use ($usersend) {
                        $message->to($usersend['to']);
                        $message->subject($usersend['title']);
                    });



                    return redirect()->back()->with('success', 'Card Activated');
            
            
                }elseif($carddata->status=='4'){ //DEACTIVATION Pending
                    $cardupdate['status'] = '5'; //Deactivated;
                    $carddata->update($cardupdate);

                    
                    $user = User::find($carddata->u_id);
                    $usersend['to'] = $user->email;
                    $usersend['title'] = 'Card Deactivated'; 
                    $maildata = [                        
                        'title' => $usersend['title'], 
                        'content' => 'We deactivated your card. <br> Card Number: <b>'.$carddata['number'].' </b>', 
                    ]; 
                    Mail::send('mail', $maildata, function($message) use ($usersend) {
                        $message->to($usersend['to']);
                        $message->subject($usersend['title']);
                    });


                    return redirect()->back()->with('success', 'Successfully Deactivated');
                }else{
                    return redirect()->back()->with('error', 'We are unable to make change in your card');
                }
    }


    public function carddeactivatedecline(Request $request, $id){

        $cardupdate = $request->except('_token', '_method'); //will_get_message

        $carddata = CardRequest::find($id);
       if($carddata->status=='7'){  //Activation Pending
           $cardupdate['status'] = '5'; //Deactivated;
           $carddata->update($cardupdate);
          
          
          
          
           $user = User::find($carddata->u_id);
           $usersend['to'] = $user->email;
           $usersend['title'] = 'Card not activated'; 
           $maildata = [                        
               'title' => $usersend['title'], 
               'content' => 'We can\'t activate your card. <br> Card Number: <b>'.$carddata['number'].' </b>', 
           ]; 
           Mail::send('mail', $maildata, function($message) use ($usersend) {
               $message->to($usersend['to']);
               $message->subject($usersend['title']);
           });

           return redirect()->back()->with('success', 'Card not Activated');
       }elseif($carddata->status=='4'){ //DEACTIVATION Pending
           $cardupdate['status'] = '1'; //Activated;
           $carddata->update($cardupdate);

           $user = User::find($carddata->u_id);
           $usersend['to'] = $user->email;
           $usersend['title'] = 'Card not deactivated'; 
           $maildata = [                        
               'title' => $usersend['title'], 
               'content' => 'We cant\'t deactivate your card. <br> Card Number: <b>'.$carddata['number'].' </b>', 
           ]; 
           Mail::send('mail', $maildata, function($message) use ($usersend) {
               $message->to($usersend['to']);
               $message->subject($usersend['title']);
           });


           return redirect()->back()->with('success', 'Not Deactivated');
       }else{
           return redirect()->back()->with('error', 'We are unable to make change in your card');
       }

       
}


    public function cardrequeststore(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'name' => 'required',
        ]);
        $in = $request->except('_token');
        $in['status'] = 1;
        CardRequest::create($in);

        return redirect()->back()->with('success', 'Created Successfully');
    }




    



    public function cardrequestdeliver(Request $request, $id)
    {
        $this->validate($request, [
            'holdername' => 'required',
            'number' => 'required',
            'exp' => 'required',
            'security' => 'required',
        ]);
        $in = $request->except('_token', '_method');
        $in['status'] = '1';
        CardRequest::whereId($id)->update($in);

        $cardreq=CardRequest::find($id);


        if((CardTrans::where('card_id', $id)->count())<1){  
            $cardtr['u_id'] = $cardreq->u_id;
            $cardtr['card_id'] = $id;
            $cardtr['details'] = 'Inital Card Balance';
            $cardtr['type'] = '+';
            $cardtr['trx'] = str_random(7);
            $cardtr['amount'] = $cardreq->balance;
            $cardtr['postbalance'] = $cardreq->balance;
            $cardtr['price'] = $cardreq->price;
            $cardtr['status'] = '1';
            CardTrans::create($cardtr);

        }



        $userddd = User::find($cardreq->u_id);
        $usersend['to'] = $userddd->email;
        $usersend['title'] = 'Card Ready'; 
        $maildata = [                        
            'title' => $usersend['title'], 
            'content' => 'Your card is ready to use. Please check your dashboard.', 
        ]; 
        
        if($userddd->tcard==NULL){
                    $tcard = 1;
        }else{
                    $tcard = $userddd->tcard + 1;
        }

       $userddd->update(['tcard'=> $tcard]);
        Mail::send('mail', $maildata, function($message) use ($usersend) {
            $message->to($usersend['to']);
            $message->subject($usersend['title']);
        });




        return back()->with('success', 'Delivered Successfully');
    }


    public function undoreq(Request $request, $id)
    {
        $in = $request->except('_token', '_method');
        $in['status'] = '2';
        CardRequest::whereId($id)->update($in);
        return back()->with('success', 'Undo Successful');
    }





    public function cardrequestdecline(Request $request, $id)
    {

        $userid = CardRequest::find($id);
        
        $userd = User::find($userid->u_id);
        $balance = $userd->balance + $userid->price;
        $balance = floatval($balance);
        $balance = round($balance, 2);



        $trns['user_id'] = $userid->u_id;
        $trns['details'] = 'Card Charge Return';
        $trns['type'] = '+';
        $trns['balance'] = $balance;
        $trns['amount'] = $userid->price;
        $trns['success'] = '1';
        $trns['g_id'] = NULL;
        $trns['category'] = 'cardreturn';
        $trns['trx'] =  str_random(10);
        Transaction::create($trns);







        User::whereId($userid->u_id)->update([
            'balance' => $balance,
        ]);


        $in = $request->except('_token', '_method');
        $in['status'] = '3';
        CardRequest::whereId($id)->update($in);

       $carddata =  CardRequest::find($id);

        $userddd = User::find($carddata->u_id);
        $usersend['to'] = $userddd->email;
        $usersend['title'] = 'Your card could not be created.'; 
        $maildata = [                        
            'title' => $usersend['title'], 
            'content' => 'We are sorry to inform you that, we can\'t process your card. <br><br>Message:'.$carddata->message, 
        ]; 
        Mail::send('mail', $maildata, function($message) use ($usersend) {
            $message->to($usersend['to']);
            $message->subject($usersend['title']);
        });



        return back()->with('success', 'Successfully Declined');
    }


    /***************************************
     *          CARD REQUEST END
     *          CARD REQUEST END
     *          CARD REQUEST END
     */















    /***************************************
     *          CARD REQUEST END           
     *          CARD REQUEST END
     *          CARD REQUEST END
    /***************************************/



        /***************************************
     *          CARD RELOAD START           
     *          CARD RELOAD START           
     *          CARD RELOAD START           
    /***************************************/

     public function cardreload()
     {
         $subcat = CardTrans::orderBy('created_at', 'desc')
         ->where('category', 'cardreload')
         ->paginate(10);
         $cate = cardcategory::whereStatus(1)->get();
         return view('admin.card.reload', compact('subcat', 'cate'));
     }
 
     public function cardreloadapprove(Request $request, $id)
     {
        $subcat = CardTrans::find($id);
        $carddata = CardRequest::find($subcat->card_id);

        if ($subcat) {
            $subcat->update([
                'postbalance' => $carddata->balance+$subcat->amount,
                'message' => $request->message,
                'status' => 1,
            ]);

            $carddata->update([
                'balance' => $carddata->balance+$subcat->amount,
            ]);



            $deposit= CardTrans::find($id);
            $userddd = User::find($deposit->u_id);
            $usersend['to'] = $userddd->email;
            $usersend['title'] = 'Reload Complete'; 
            $maildata = [                        
                'title' => $usersend['title'], 
                'content' => 'We card reload request of total $'.$deposit->amount.' is completed. <br> Thanks for staying with us.', 
            ]; 
            Mail::send('mail', $maildata, function($message) use ($usersend) {
                $message->to($usersend['to']);
                $message->subject($usersend['title']);
            });

            



            return back()->with('success', 'Reload sucessfull');
        } else {
            return back()->with('error', 'Unexpected Error');
        }
    
     }

 
     public function cardreloaddecline(Request $request, $id)
     {
        $subcat = CardTrans::find($id);

        if ($subcat) {
         

            
            $subcat->update([
                'message' => $request->message,
                'status' => 3,
            ]);
    

            $userdata= User::find($subcat->u_id);
            $totalcost = $subcat->amount+ $subcat->price;  //Price= fee

            $trns['user_id'] = $subcat->u_id;
            $trns['details'] = 'Card Reload Charge Return';
            $trns['type'] = '+';
            $trns['trx'] =  str_random(10);
            $trns['balance'] = $userdata->balance + $totalcost;
            $trns['amount'] = $totalcost;
            $trns['success'] = '1';
            $trns['category'] = 'cardreload';
            Transaction::create($trns);
  
            $userdata = User::find($subcat->u_id);

            $userdata->update(['balance' => $userdata->balance + $totalcost]);


            $deposit= CardTrans::find($id);
            $userddd = User::find($deposit->u_id);
            $usersend['to'] = $userddd->email;
            $usersend['title'] = 'Reload Declined'; 
            $maildata = [                        
                'title' => $usersend['title'], 
                'content' => 'Your card reload request of total $'.$deposit->amount.' is declined. <br><br> Message:'.$deposit->message, 
            ]; 
            Mail::send('mail', $maildata, function($message) use ($usersend) {
                $message->to($usersend['to']);
                $message->subject($usersend['title']);
            });


            
            return back()->with('success', 'Reload Declined');
        } else {
            return back()->with('error', 'Unexpected Error');
        }
     }




        /***************************************
     *          CARD RELOAD END           
     *          CARD RELOAD END           
     *          CARD RELOAD END           
    /***************************************/





    /***************************************
     *          CARD WITHDRAW START           
     *          CARD WITHDRAW START           
     *          CARD WITHDRAW START           
    /***************************************/

     public function cardwithdraw()
     {
         $subcat = CardTrans::orderBy('created_at', 'desc')
         ->where('category', 'cardwithdraw')
         ->paginate(10);
         $cate = cardcategory::whereStatus(1)->get();
         return view('admin.card.withdraw', compact('subcat', 'cate'));
     }
 

     public function cardwithdrawapprove(Request $request, $id)
     {
        $subcat = CardTrans::find($id);

        if ($subcat) {
            $card = CardRequest::find($subcat->card_id);
        
            $subcat->update([
                'postbalance' => $card->balance-$subcat->amount,
                'message' => $request->message,
                'status' => 1,
            ]);
        
            $card->update([
                'balance' => $card->balance - $subcat->amount - $subcat->price,  //balance - (amount+fee)
            ]);


            $deposit= CardTrans::find($id);
            
            
            $userddd = User::find($deposit->u_id);
            
            
            
            
            $trns['user_id'] = $deposit->u_id;
            $trns['details'] = 'Card Withdrawal';
            $trns['type'] = '+';
            $trns['balance'] = $userddd->balance+$deposit->amount;
            $trns['amount'] = $deposit->amount;
            $trns['success'] = '1';
            $trns['category'] = 'cardwithdrawadd';
            $trns['trx'] =  str_random(10);
            Transaction::create($trns);
            
            $userddd->update(['balance' => $userddd->balance+$deposit->amount]);
            
            
            
            $usersend['to'] = $userddd->email;
            $usersend['title'] = 'Card Withdraw Complete'; 
            $maildata = [                        
                'title' => $usersend['title'], 
                'content' => 'Your card withdraw request of total $'.$deposit->amount.' is completed. <br> Thanks for staying with us.', 
            ]; 
            Mail::send('mail', $maildata, function($message) use ($usersend) {
                $message->to($usersend['to']);
                $message->subject($usersend['title']);
            });




            return back()->with('success', 'Withdraw sucessfull');
        } else {
            return back()->with('error', 'Unexpected Error');
        }
        

     }


     public function cardwithdrawdecline(Request $request, $id)
     {
        $subcat = CardTrans::find($id);

        if ($subcat) {
         
            $subcat->update([
                'message' => $request->message,
                'status' => 3,
            ]);
    

            $deposit= CardTrans::find($id);
            $userddd = User::find($deposit->u_id);
            $usersend['to'] = $userddd->email;
            $usersend['title'] = 'Card Withdraw Declined'; 
            $maildata = [                        
                'title' => $usersend['title'], 
                'content' => 'Your card withdraw request of total $'.$deposit->amount.' is declined. <br><br> Message:'.$deposit->message, 
            ]; 
            Mail::send('mail', $maildata, function($message) use ($usersend) {
                $message->to($usersend['to']);
                $message->subject($usersend['title']);
            });



            return back()->with('success', 'Withdraw Declined');
        } else {
            return back()->with('error', 'Unexpected Error');
        }
     }




        /***************************************
     *          CARD WITHDRAW END           
     *          CARD WITHDRAW END           
     *          CARD WITHDRAW END           
    /***************************************/















    /** Deposit START */
    /** Deposit START */
    /** Deposit START */
    /** Deposit START */



    public function depositlist()
    {
        $depositd = DepositData::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.payment.list', compact('depositd'));
    }


    public function deposit_approve(Request $request, $id)
    {

        $deposit =  DepositData::whereId($id)->first();


        if ($deposit->pstat == '0') {
            $userd = User::find($deposit->user_id);
            $balance = floatval($userd->balance) + floatval($deposit->amount);
            $balance = floatval($balance);
            $balance = round($balance, 2);
            $totaldeposit = $userd->totaldeposit;

            if ($totaldeposit == NULL) {
                $totaldeposit = $deposit->amount;
                $totaldeposit = floatval($totaldeposit);
                $totaldeposit = round($totaldeposit, 2);
            } else {
                $totaldeposit = floatval($totaldeposit) + floatval($deposit->amount);
                $totaldeposit = floatval($totaldeposit);
                $totaldeposit = round($totaldeposit, 2);
            }


            $trns['user_id'] = $deposit->user_id;
            $trns['details'] = 'Manual Deposit';
            $trns['type'] = '+';
            $trns['balance'] = $balance;
            $trns['amount'] = $deposit->amount;
            $trns['success'] = '1';
            $trns['g_id'] = '2';
            $trns['category'] = 'deposit';
            $trns['trx'] =  str_random(10);
            Transaction::create($trns);



            //REFFERAL BONUS
            if ($totaldeposit >= 50 && $userd->refstat == NULL && $userd->referby != NULL) {

                $userr = User::find($userd->referby);
                $refb = $userr->balance + 5;
                $refb = floatval($refb);
                $refb = round($refb, 2);

                $trns['user_id'] = $userd->referby;
                $trns['details'] = 'Refferal Bonus';
                $trns['type'] = '+';
                $trns['balance'] = $refb;
                $trns['amount'] = '5';
                $trns['success'] = '1';
                $trns['category'] = 'referal';
                $trns['trx'] =  str_random(10);
                Transaction::create($trns);

                //UPDATE REFERBY USER BALANCE
                User::whereId($userd->referby)->update([
                    'balance' => $refb,
                ]);



                         //SEND MAIL TO USER FOR REFER COMMISION
                         $userrrr = User::find($userd->referby);
                         $usersend['to'] = $userrrr->email;
                         $usersend['title'] = 'Refferal Commission'; 
                         $maildata = [                        
                             'title' => $usersend['title'], 
                             'content' => 'You have got referral $5 bonus. Thanks for your contribution.', 
                         ]; 
                         Mail::send('mail', $maildata, function($message) use ($usersend) {
                             $message->to($usersend['to']);
                             $message->subject($usersend['title']);
                         });



                //DEPOSIT Deposit USER BALANCE FOR SUCCESSFULL DEPOSIT
                User::whereId($deposit->user_id)->update([   //CHANGING REFERRAL BONUS STAT
                    'balance' => $balance,
                    'totaldeposit' => $totaldeposit,
                    'refstat' => '1',
                ]);


            } else {
                User::whereId($deposit->user_id)->update([
                    'balance' => $balance,
                    'totaldeposit' => $totaldeposit,
                ]);
            }


            $deposit->update([
                'status' => '1',
                'pstat' => '1',
            ]);

            $in = $request->except('_token', '_method');
            $in['status'] = '1';
            DepositData::whereId($id)->update($in);



            $userddd = User::find($deposit->user_id);
            $usersend['to'] = $userddd->email;
            $usersend['title'] = 'Deposit Approved'; 
            $maildata = [                        
                'title' => $usersend['title'], 
                'content' => 'We approved your deposit request of total $'.$deposit->amount.'. Thanks for your payment.', 
            ]; 
            Mail::send('mail', $maildata, function($message) use ($usersend) {
                $message->to($usersend['to']);
                $message->subject($usersend['title']);
            });





            return back()->with('success', 'Approved Successfully');
        } else {
            return back()->with('error', 'Payment already added');
        }


        return back()->with('error', 'Something went wrong');
    }



    
    public function depositdecline(Request $request, $id)
    {
        $in = $request->except('_token', '_method');
        $in['status'] = '6';
      
        DepositData::whereId($id)->update($in);



        $deposit= DepositData::find($id);
        $userddd = User::find($deposit->user_id);
        $usersend['to'] = $userddd->email;
        $usersend['title'] = 'Deposit Declined'; 
        $maildata = [                        
            'title' => $usersend['title'], 
            'content' => 'Your deposit request of total $'.$deposit->amount.' is declined. <br><br> Message:'.$deposit->message, 
        ]; 
        Mail::send('mail', $maildata, function($message) use ($usersend) {
            $message->to($usersend['to']);
            $message->subject($usersend['title']);
        });





        return back()->with('success', 'Successfully Declined');
    }


    /** Deposit END */
    /** Deposit END */
    /** Deposit END */
    /** Deposit END */




    
    /** Withdraw START */
    /** Withdraw START */
    /** Withdraw START */
    /** Withdraw START */



    public function withdrawlist()
    {
        $depositd = WithdrawData::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.payment.wlist', compact('depositd'));
    }


    public function withdraw_approve(Request $request, $id)
    {
        $in = $request->except('_token', '_method');
        $in['status'] = '1';
        $in['pstat'] = '1';
        WithdrawData::whereId($id)->update($in);



        $deposit= WithdrawData::find($id);
        $userddd = User::find($deposit->user_id);
        $usersend['to'] = $userddd->email;
        $usersend['title'] = 'Withdraw Completed'; 
        $maildata = [                        
            'title' => $usersend['title'], 
            'content' => 'Your withdraw request of total $'.$deposit->amount.' is completed. Thanks for staying with us.', 
        ]; 
        Mail::send('mail', $maildata, function($message) use ($usersend) {
            $message->to($usersend['to']);
            $message->subject($usersend['title']);
        });




        return back()->with('success', 'Successfully Approved');
    }



    public function withdrawdecline(Request $request, $id)
    {
        $in = $request->except('_token', '_method');

        $deposit =  WithdrawData::whereId($id)->first();


        if ($deposit->pstat == '0') {
            $userd = User::find($deposit->user_id);
            $userdb = $userd->balance + $deposit->amount;
            $userdb = floatval($userdb);
            $userdb = round($userdb, 2);

            $trns['user_id'] = $deposit->user_id;
            $trns['details'] = 'Withdrawal Return';
            $trns['type'] = '+';
            $trns['balance'] = $userdb;
            $trns['amount'] = $deposit->amount;
            $trns['success'] = '1';
            $trns['category'] = 'withdrawreturn';
            $witrnsth['trx'] =  str_random(10);
            Transaction::create($trns);

            

            User::whereId($deposit->user_id)->update([
                'balance' => $userdb,
            ]);

        }

        $in['status'] = '3';
        $in['pstat'] = '1';
        WithdrawData::whereId($id)->update($in);




        $deposit= WithdrawData::find($id);
        $userddd = User::find($deposit->user_id);
        $usersend['to'] = $userddd->email;
        $usersend['title'] = 'Withdraw Declined'; 
        $maildata = [                        
            'title' => $usersend['title'], 
            'content' => 'Your withdraw request of total $'.$deposit->amount.' is declined. <br>Your amount has been refunded.<br><br> Message:'.$deposit->message, 
        ]; 
        Mail::send('mail', $maildata, function($message) use ($usersend) {
            $message->to($usersend['to']);
            $message->subject($usersend['title']);
        });




        return back()->with('error', 'Successfully Declined');
    }




    /** Withdraw END */
    /** Withdraw END */
    /** Withdraw END */
    /** Withdraw END */



    public function createcard()
    {
        $cardcategory = cardsubcategory::whereStatus(1)->get();
        $cards = card::paginate(10);
        return view('admin.card.createcard', compact('cardcategory', 'cards'));
    }

    public function createcardstore(Request $request)
    {


        $this->validate($request, [
            'category_id' => 'required',
            'card_details' => 'required',
            'card_image' => 'mimes:jpg,jpeg,png,svg',

        ]);



        if ($request->hasFile('card_image')) {
            $image = $request->file('card_image');
            $imageName = time() . '.jpg';
            $location = 'assets/images/cardimage/' . $imageName;
            Image::make($image)->save($location);
            $name = $imageName;
        } else {
            $name = '';
        }

        $cat = cardsubcategory::find($request->category_id);

        card::create([
            'sub_category_id' => $request->category_id,
            'card_details' => $request->card_details,
            'card_image' => $name,
            'category_id' => $cat->id,
            'status' => 1,
        ]);


        return back()->with('success', 'Card Created Successfully');
    }


    public function createcardedit($id)
    {
        $cardcategory = cardcategory::all();
        $cardedit = card::where('id', $id)->first();
        return view('admin.card.cardedit', compact('cardcategory', 'cardedit'));
    }

    public function createcardupdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'card_details' => 'required',
            'card_image' => 'mimes:jpg,jpeg,png,svg',

        ]);

        $car = card::find($id);
        $cat = cardsubcategory::find($request->category_id);

        if ($request->hasFile('card_image')) {
            @unlink('assets/images/cardimage/' . $car->card_image);
            $image = $request->file('card_image');
            $imageName = time() . '.jpg';
            $location = 'assets/images/cardimage/' . $imageName;
            Image::make($image)->save($location);
            $name = $imageName;
        } else {
            $name = $car->card_image;
        }

        card::whereId($id)->update([
            'sub_category_id' => $request->category_id,
            'card_details' => $request->card_details,
            'card_image' => $name,
            'status' => $request->status,
            'category_id' => $cat->id,
        ]);


        return back()->with('success', 'Card Updated Successfully');
    }



    public function cardListIndex()
    {
        $sub_cat = cardsubcategory::whereStatus(1)->get();
        $cat = cardcategory::whereStatus(1)->get();
        return view('admin.card.car_index', compact('cat', 'sub_cat'));
    }

    public function cardSearch(Request $request)
    {
        $sub_cat = cardsubcategory::whereStatus(1)->get();
        $cat = cardcategory::whereStatus(1)->get();

        if ($request->category_id != '' && $request->sub_cate_id != '') {
            $card = card::where('category_id', $request->category_id)->where('sub_category_id', $request->sub_cate_id)->get();
        } elseif ($request->category_id == '') {
            $card = card::where('sub_category_id', $request->sub_cate_id)->get();
        } else {
            $card = card::where('category_id', $request->category_id)->get();
        }

        return view('admin.card.car_index', compact('cat', 'sub_cat', 'card'));
    }

    public function createcarddelete(Request $request)
    {
        $carddel = card::find($request->delid);
        $carddel->delete();
        return back()->with('success', 'Card Deleted Successfully');
    }



    public function addsubmoneytouser($id)
    {
        $user = User::find($id);



        return view('admin.users.addsubmoney', compact('user'));
    }



    public function addsubmoneytousersave(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required',
            'details' => 'required',
        ]);

        $user = User::find($id);

        // $toggle = $request->opation == null ? 2 : 1;
        if ($request->opation != null) {

            if ($request->amount >= 0) {

                $trans = new Transaction();
                $trans->user_id = $user->id;
                $trans->amount = $request->amount;
                $trans->trx = str_random(10);
                $trans->details = 'Balance added by Admin';
                $trans->message = $request->details;
                $trans->type = '+';
                $trns['category'] = 'admincredit';
                $userbl = $trans['balance'] = $user['balance'] + $request->amount;
                $trans->success = '1';
                $trans->save();



                $user = User::find($id);
                $usernewBal = $user['balance'] = $user['balance'] + $request->amount;
                $user->save();


                return back()->with('success', 'Add Money Successfully');
            } else {
                return back()->with('alert', 'insuficient balnace');
            }
        } else {


            $balnace = $user->balance - $request->amount;

            if ($user->balance <= 0 || $user->balance <= $balnace) {
                return back()->with('alert', 'insuficient balnace');
            } else {

                $trans = new Transaction();
                $trans->user_id = $user->id;
                $trans->amount = $request->amount;
                $trans->trx = str_random(10);
                $trans->details = 'Balance substruct by Admin';
                $trans->message = $request->details;
                $trans->type = '-';
                $trans->success = '1';
                $trns['category'] = 'admindebit';
                $userbl = $trans['balance'] = $user['balance'] - $request->amount;
                $trans->save();

                $userss = User::find($id);
                $usernewBal = $userss['balance'] = $userss['balance'] - $request->amount;
                $userss->save();


                return back()->with('success', 'Substruct Money Successfully');
            }
        }
    }


    public function admintransaction()
    {
        $tran = Transaction::orderBy('id', 'desc')->paginate(10);
        return view('admin.website.transaction', compact('tran'));
    }


    public function bannerIndex()
    {
        return view('admin.website.banner');
    }

    public function breadcrumbIndex()
    {
        return view('admin.website.bredcamb');
    }

    public function bannerUp(Request $request)
    {
        $this->validate($request, [
            'welcome_header_title' => 'required',
            'welcome_header_des' => 'required',
        ]);
        if ($request->hasFile('banner')) {

            $image = $request->file('banner');
            $imageName = 'banner.png';
            $directory = 'assets/images/' . $imageName;
            Image::make($image)->save($directory);
        }


        $welh = General::first();
        $welh->welcome_header_title = $request->welcome_header_title;
        $welh->welcome_header_des = $request->welcome_header_des;
        $welh->save();



        return back()->with('success', 'Update Successfully');
    }

    public function breadcrumbUp(Request $request)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = 'menu.png';
            $directory = 'assets/images/' . $imageName;
            Image::make($image)->save($directory);
        }

        return back()->with('success', 'Update Successfully');
    }


    public function subscriber()
    {
        $subs = sucscribe::paginate();
        return view('admin.website.subscriber', compact('subs'));
    }

    public function subsIndex()
    {
        return view('admin.website.mail_subscriber');
    }


    public function subscribersend(Request $request)
    {
        $sendemail = sucscribe::all();
        foreach ($sendemail as $data) {
            $gnl = General::first();
            send_email($data->email, $gnl->email, 'This is from ' . $gnl->title, $gnl->template);
        }
        return back()->with('success', 'Email Send Successfully');
    }



    public function blog()
    {
        $blog = blog::paginate(10);
        return view('admin.blog.blog', compact('blog'));
    }

    public function blogsave(Request $request)
    {


        $blog = new blog();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName('image');
            $directory = 'assets/images/blog/';
            $imgUrl  = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $blog->image = $imgUrl;
        }


        $blog->title = $request->title;
        $blog->des = $request->des;
        $blog->status = $request->status;
        $blog->save();
        return back()->with('success', 'Blog Saved Successfully');
    }

    public function blogupdate(Request $request)
    {
        $blogup = blog::find($request->id);
        if ($request->hasFile('image')) {
            @unlink($blogup->image);
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName('image');
            $directory = 'assets/images/blog/';
            $imgUrl  = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $blogup->image = $imgUrl;
        }

        $blogup->title = $request->title;
        $blogup->des = $request->des;
        $blogup->status = $request->status;
        $blogup->save();
        return back()->with('success', 'Blog Updated Successfully');
    }


    public function blogdelete(Request $request)
    {
        blog::findOrFail($request->delcfrm)->delete();
        return back()->with('success', 'Blog Deleted Successfully');
    }


    public function contact()
    {
        $general = General::first();
        return view('admin.website.contact', compact('general'));
    }

    public function contactupdate(Request $request)
    {
        $this->validate($request, [
            'website_number' => 'required',
            'website_email_address' => 'required',
            'website_address' => 'required',
        ]);
        $gnlr = General::first();
        $gnlr->website_number = $request->website_number;
        $gnlr->website_email_address = $request->website_email_address;
        $gnlr->website_address = $request->website_address;

        $gnlr->save();
        return back()->with('success', 'Contact details Updated Successfully');
    }

    public function subscriberheader(Request $request)
    {
        $this->validate($request, [
            'subs_title' => 'required',
            'subs_des' => 'required',
        ]);
        $gnlr = General::first();
        $gnlr->subs_des = $request->subs_des;
        $gnlr->subs_title = $request->subs_title;
        $gnlr->save();
        return back()->with('success', ' Updated Successfully');
    }

    public function staticHead(Request $request)
    {
        $this->validate($request, [
            'static_head' => 'required',
            'static_des' => 'required',
        ]);
        $gnlr = General::first();
        $gnlr->static_head = $request->static_head;
        $gnlr->static_des = $request->static_des;
        $gnlr->save();
        return back()->with('success', ' Updated Successfully');
    }
}
