<?php

namespace App\Http\Controllers;

use App\AdminNotif;
use App\CardRequest;
use App\CardTrans;
use App\userCard;
use Auth;
use App\User;
use App\Deposit;
use App\Gateway;
use App\General;
use App\Notices;
use App\Seo;
use App\Withdraw;
use Carbon\Carbon;
use App\Transaction;
use App\WithdrawData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
       
    public function index()
    {





        $data = [
            'data'=> CardRequest::where('u_id', Auth::id())->orderBy('created_at', 'desc')->get(),
            'actvc'=> CardRequest::where('u_id', Auth::id())->where('status', 1)->orderBy('created_at', 'desc')->get(),
            'pt'=> Seo::first()->home,
            'notices'=> Notices::where('status', '1')->get(),
             'cardtrns'=> CardTrans::where('u_id', Auth::id())->orderBy('created_at', 'desc')->take(10)->get(),
             'tran'=> Transaction::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(10)->get(),


        ];
      

        return view('user.home',$data);

    }

    public function transactionLog()
    {
        $pt = 'Transaction Log';
        $logs = Transaction::where('user_id',Auth::id())->orderBy('id','DESC')->paginate(10);
        return view('user.tlog', compact('pt','logs'));
    }
    
    public function balance()
    {
        $pt = 'Manage Balance';
        $gates = Gateway::where('status',1)->get();
        return view('user.balance', compact('pt','gates'));
    }

    public function depositPost(Request $request)
    {
        $this->validate($request, [
        'amount' => 'required',
        'gateway' => 'required',
        'proof' => 'required'
        ]);

        $gate = Gateway::findOrFail($request->gateway);
        if(isset($gate))
        {
            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount;
            $depo['proof'] = $request->proof;
            $depo['status'] = 0;
            Deposit::create($depo);

            return back()->with('success', 'Deposit Request Sent Successfully!');
            
        }
        else
        {
            return back()->with('alert', 'Please Select Deposit gateway');
            
        }
         
    }
        
    public function withdrawPost(Request $request)
    {

        
        
        $sitedata = General::first();
     
        if($request->amount<$sitedata->minwith){
            return response()->json(['status' => 'error', 'message' => 'Sorry, request amount is less than'.$sitedata->minwith]);
        }

        $penddeposit = WithdrawData::where('user_id',Auth::id())->where('status', 3)->count();
        $pendconf = WithdrawData::where('user_id',Auth::id())->where('status', 2)->count();

        if($pendconf >1){
            return response()->json(['status' => 'error', 'message' => 'Maximum withdraw limit exceed']);
        }

   

        $this->validate($request, [

            'g_id' => 'required|int',
            'amount' => 'required|int|min:1',
            'address' => 'required'

        ]);


        
        $user = User::find(Auth::id());

        if($user->balance >= $request->amount){
        
            $user['balance'] = $user->balance - $request->amount;
            $user->update();
            
            
            $with =  $request->except('_token');
            $with['category'] = 'withdraw';
            $with['type'] = '-';
            $with['success'] = '1';
            $with['details'] = 'Withdraw Payment';
            $with['balance'] = $user['balance'];
            $with['user_id'] = Auth::id();
            $with['trx'] =  str_random(10);
            $trnsid =   Transaction::create($with)->id;




            $with =  $request->except('_token','g_id');
            $with['user_id'] = Auth::id();
            $with['details'] = 'Manual Withdraw Payment';
            $with['gateway'] =  $request->g_id;
            $with['currency'] = 'USD';
            $with['trx'] =  str_random(10);
            $with['fee'] = '0.00';
            $with['amount'] = $request->amount;
            $with['status'] = '2';  //PROCESSING
            $with['pstat'] = '0';  //Not touched
            $with['trnsid'] = $trnsid;  //Linked Transaction
            WithdrawData::create($with);


            
            $adminntf['title'] = 'Manual Withdraw Request';
            $adminntf['subtitle'] = 'A user is requested for manual withdraw confirmation of USD'.  $request->amount;
            $adminntf['dest'] = 'withdraw';
            AdminNotif::create($adminntf);

            return response()->json(['status' => 'success', 'message' => 'Withdraw request submitted successfully', 'url' => route('user.withdraw')]);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Sorry, You dont have sufficient balance']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
         

    }

    public function changePasswordForm()
    {
        return view('auth.passwords.change');
    }
        
    public function changePassword(Request $request)
    {
        $this->validate($request,
        [
            'password' => 'required|string|min:6|confirmed'
        ]);
        $user = User::find(Auth::id());
        if($request->password == $request->password_confirmation)
        {
            $user['password'] = Hash::make($request->password);
            $user->update();

            return back()->with('success', 'Password Changed');
        }
        else 
        {
            return back()->with('alert', 'Password Not Matched');
        }
    }
     
}
    