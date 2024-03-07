<?php

namespace App\Http\Controllers;

use App\AdminNotif;
use App\card;
use App\CardBinNumber;
use App\cardcategory;
use App\cardsubcategory;
use App\Deposit;
use App\CardRequest;
use App\CardTrans;
use App\Gateway;
use App\Transaction;
use App\User;
use App\userCard;
use App\DepositData;
use App\General;
use App\Seo;
use App\WithdrawData;
use App\withdrawG;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{

   private $seodata;
  

   public function __construct()
    {
      
        $this->seodata = Seo::first();
    }


    public function buycard()
    {

        $pt = "Buy Card";
        $category = cardcategory::whereStatus(1)->get();
        return view('user.card.buycard',compact('category', 'pt'));
    }


    public function add_card(){
       
        $data = [
            'pt' => $this->seodata->cards,
            'data'=>cardsubcategory::where('status', '1')->get(),
        ];
        return view('user.card.add_card',$data);
    }


    

    public function usercardlist(){

        $data = [
            'pt' => $this->seodata->cards,
            'data'=> CardRequest::where('u_id', Auth::id())->orderBy('created_at', 'desc')->get(),
            'actvc'=> CardRequest::where('u_id', Auth::id())->where('status', 1)->orderBy('created_at', 'desc')->get(),
        //    'cardtrns'=> CardTrans::where('u_id', Auth::id())->where('status', 1)->orderBy('created_at', 'desc')->get(),
        ];
        return view('user.card.cardlist',$data);
    }


    public function carddeactive($id){

        $carddata = CardRequest::find($id);
        if($carddata->u_id==Auth::id()){
                if($carddata->status=='5'){
                    $carddata->update(['status'=>'7']);//Activation pending;

                    $adminntf['title'] = 'Card Activation Request';
                    $adminntf['subtitle'] = 'A user is requesting for card activation';
                    $adminntf['dest'] = 'cardad';
                    AdminNotif::create($adminntf);
    
                    return redirect()->back()->with('success', 'We are activating your card. Please wait till confirmation');
                }elseif($carddata->status=='1'){

                    $totalactv = CardRequest::where('u_id', Auth::id())->where('status', 1)->orderBy('created_at', 'desc')->count();
                    if ($totalactv<2) {
                        return redirect()->back()->with('error', 'You need at least one card activated');
                    }

                    $carddata->update(['status'=>'4']); //Deactivate pending;

                    $adminntf['title'] = 'Card Deactivation Request';
                    $adminntf['subtitle'] = 'A user is requesting for card activation';
                    $adminntf['dest'] = 'cardad';
                    AdminNotif::create($adminntf);

                    return redirect()->back()->with('success', 'We are processing your deactivation request. Please wait a while');
                }else{
                    return redirect()->back()->with('error', 'We are unable to make change in your card');
                }



   
                
        }else{
            return redirect()->back()->with('error', 'Unauthorized Access');
        }
     
    }


    public function withdrawcard(Request $request,$id){


        $sitedata = General::first();
     
        if($request->withdrawamount<$sitedata->mincwith){
            return redirect()->back()->with('error', 'Sorry, request amount is less than'.$sitedata->mincwith);
        }

                
                $price = $request->withdrawamount + ($request->withdrawamount*$sitedata->cwithfee);
                $price = floatval($price);
                $price = round($price, 2);




                $carddata = CardRequest::find($id);
                if($carddata->u_id==Auth::id()){
            
           if($carddata->balance>=$request->withdrawamount){

                    $cardtr['u_id'] = $carddata->u_id;
                    $cardtr['card_id'] = $id;
                    $cardtr['details'] = 'Card Withdraw';
                    $cardtr['trx'] = str_random(7);
                    $cardtr['type'] = '-';
                    $cardtr['amount'] = $price;
                   // $cardtr['postbalance'] = $carddata->balance-$price;
                    $cardtr['category'] = 'cardwithdraw';
                    $cardtr['price'] = $request->withdrawamount* $sitedata->cwithfee; //FEE
                    $cardtr['status'] = '2'; //PENDING
                    CardTrans::create($cardtr);
        }else{
                   return redirect()->back()->with('error', 'You don\t have sufficient balance.');
        }

                    $adminntf['title'] = 'Card Withdraw Request';
                    $adminntf['subtitle'] = 'A user is requesting for card withdrawal';
                    $adminntf['dest'] = 'cardw';
                    AdminNotif::create($adminntf);

                    return redirect()->back()->with('success', 'Card withdraw request is processing. Thanks for your patient');
        }else{
            return redirect()->back()->with('error', 'Unauthorized Access');
        }
     
    }


    public function reloadcard(Request $request,$id){

           
        $sitedata = General::first();
     
        if($request->reloadamount<$sitedata->minreload){
            return redirect()->back()->with('error', 'Sorry, request amount is less than'.$sitedata->mindepo);
        }




        $carddata = CardRequest::find($id);
        if($carddata->u_id==Auth::id()){
            
            $fee = $request->reloadamount*$sitedata->reloadfee;
            $fee = floatval($fee);
            $fee = round($fee, 2);

            $totalcost = $fee + $request->reloadamount;


            $userdata = User::find($carddata->u_id);

                    $trns['user_id'] = $carddata->u_id;
                    $trns['details'] = 'Card Reload Charge';
                    $trns['type'] = '-';
                    $trns['trx'] =  str_random(10);
                    $trns['balance'] = $userdata->balance - $totalcost;
                    $trns['amount'] = $totalcost;
                    $trns['success'] = '1';
                    $trns['category'] = 'cardreload';
                    Transaction::create($trns);
          
          
                    $userdata->update(['balance' =>$userdata->balance - $totalcost]);


                    $cardtr['u_id'] = $carddata->u_id;
                    $cardtr['card_id'] = $id;
                    $cardtr['trx'] =  str_random(7);
                    $cardtr['details'] = 'Card Reload';
                    $cardtr['type'] = '+';
                    $cardtr['amount'] = $request->reloadamount;
                 //   $cardtr['postbalance'] = $carddata->balance+$request->reloadamount;
                    $cardtr['category'] = 'cardreload';
                    $cardtr['price'] = $fee;
                    $cardtr['status'] = '2'; //PENDING
                    CardTrans::create($cardtr);
        

                    $adminntf['title'] = 'Card Reload Request';
                    $adminntf['subtitle'] = 'A user is requesting for card reload';
                    $adminntf['dest'] = 'cardreload';
                    AdminNotif::create($adminntf);


                    return redirect()->back()->with('success', 'Card reload request is processing. Thanks for your patient');
        }else{
            return redirect()->back()->with('error', 'Unauthorized Access');
        }
     
    }

    
    public function referral(){

        $data = [
            'pt' => $this->seodata->refer,
            'referlist'=> User::where('referby', Auth::id())->orderBy('created_at', 'desc')->get(),
           
        ];
        return view('user.refer',$data);
    }


    public function usercardreqstore(Request $request){
       
/*
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users|alpha_dash',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'string|max:255',
            'city' => 'string|max:255',
            'mobile' => 'string',
        ]);
*/

        $this->validate($request,[
            'b_id' => 'required',
            'balance' => 'required|int|min:1',
            'holdername' => 'required|string|max:255',
            'baddress' => 'required|string|max:255',
            'ptype' => 'required|int',
         ]);


        $u_id = Auth::id();
        $idata = $request->all();

        $idata['u_id'] = $u_id;
        $idata['price'] = $idata['balance']+$idata['balance']*0.1;
        $cname = cardsubcategory::where('name', $idata['b_id'])->first();
        $cname = cardcategory::find($cname['cat_id']);


        $idata['c_name'] = $cname['cat_name'];
            if($idata['ptype']=='1' ){
                if($idata['price']>Auth::user()->balance){

                    return redirect()->back()->with('error', 'Sorry. Your balance is insufficient to process this order');
                }else{

                    $balance = Auth::user()->balance - $idata['price'];

                    User::whereId(Auth::id())->update([
                        'balance' => $balance,
                     ]);


                   
                     $y2plus = date('y')+2; 
                        
                     $idata['exp'] = date('m/y');
                     $idata['expto'] = date('m').'/'.$y2plus;
                     $idata['pstat'] = '1';
                     $idata['status'] = '2';
                     $cardRequest = CardRequest::create($idata);
                   

                     if ($cardRequest) {
                        
                        $trns['user_id'] = Auth::id();
                        $trns['details'] = 'Buy Card';
                        $trns['type'] = '-';
                        $trns['trx'] =  str_random(10);
                        $trns['balance'] = $balance;
                        $trns['amount'] = $idata['price'];
                        $trns['success'] = '1';
                        $trns['category'] = 'cardp';
                        Transaction::create($trns);
                        
                     }else{
                        $trns['user_id'] = Auth::id();
                        $trns['details'] = 'Buy Card';
                        $trns['type'] = '-';
                        $trns['trx'] =  str_random(10);
                        $trns['balance'] = $balance;
                        $trns['amount'] = $idata['price'];
                        $trns['success'] = '0';
                        $trns['category'] = 'cardp';
                        Transaction::create($trns);
    
                     }
                }
            }else{


                return redirect()->back()->with('error', 'Sorry. We don\'t have any payment gateway right now. Please try again later');
            }


            $adminntf['title'] = 'New Card Request';
            $adminntf['subtitle'] = 'A user is requesting for a new card';
            $adminntf['dest'] = 'cardreq';
            AdminNotif::create($adminntf);


            return redirect('home/cardlist')->with('success', 'Your card is under processing.Please wait a few');
     

        
    }



    



    public function selectcardbycategory($id)
    {
  
        $pt = "Select Card Package";
        $card = cardsubcategory::where('cat_id',$id)->where('status',1)->get();
        return view('user.card.selectcard',compact('card','pt'));
    }

    public function cardView(Request $request, $id)
    {
        $pt = "Review Your Purchase";
        $this->validate($request,[
           'qty' => 'required|int|min:1'
        ]);
        $sub = cardsubcategory::find($id);
        $card = card::where('sub_category_id', $id)->where('user_id',0);
        $qty = $request->qty;

        if ($card->count() >= $request->qty){
            return view('user.card.view_card', compact('card','sub','qty','pt'));
        }else{
            return back()->with('alert','Not Available Quantity');
        }

    }

    
    public function usercardstore(Request $request)
    {

        $sub = cardsubcategory::findOrfail($request->sub_cat);
        $price = $request->qty * $sub->price;
        $user = User::find(Auth::id());

        if (Auth::user()->balance >= $price){

            $p = card::where('sub_category_id', $sub->id)->where('user_id',0)->take($request->qty);

            if ($p->count() < $request->qty){
                return redirect('home/select-category')->with('alert', 'Not Available Quantity');
            }

            foreach ($p->get() as $data){
                $data->status = 1;
                $data->user_id = Auth::id();
                $data->save();
            }


            


            $new_balance =  $user['balance'] - $price;
            $user['balance'] = $new_balance;
            $user->save();

            $trns = new Transaction();
            $trns->user_id = $user->id;
            $trns->amount = $price;
            $trns->trxid = str_random(16);
            $trns->details = "Buy Card";
            $trns->type = 5;
            $trns->balance = $new_balance;
            $trns->save();

            return redirect('home/select-category')->with('msg', 'Successfully Buy Complete');
        }else{
            return redirect('home/select-category')->with('alert', 'Insufficient Balance');
        }


    }


    public function userwithdraw()
    {

        $pt = $this->seodata->withdraw;
        $gateways = withdrawG::where('status',1)->get();
        $d_data = WithdrawData::where('user_id',Auth::id())->orderBy('id','desc')->get();
        $penddeposit = WithdrawData::where('user_id',Auth::id())->where('status', 3)->count();
        $pendconf = WithdrawData::where('user_id',Auth::id())->where('status', 2)->count();
       
        return view('user.withdraw.withdraw',compact('gateways', 'pt', 'd_data', 'penddeposit', 'pendconf'));
    }


    public function userdeposit()
    {
        $pt = "Deposit Now";
        $gateways = Gateway::where('status',1)->get();
        $d_data = DepositData::where('user_id',Auth::id())->orderBy('id','desc')->get();
        $penddeposit = DepositData::where('user_id',Auth::id())->where('status', 3)->count();
        $pendconf = DepositData::where('user_id',Auth::id())->where('status', 2)->count();
        
        
        return view('user.deposit.deposit',compact('gateways', 'pt', 'd_data', 'penddeposit', 'pendconf'));
    }

    public function userdepositdatainsert(Request $request)
    {

        //$this->validate($request,['amount' => 'required','gateway' => 'required']);
        if ($request->amount <= 0){
            return back()->with('alert', 'Invalid Amount');
        }else{
            $gate = Gateway::findOrFail($request->gateway);

            $charge = $gate->fixed_charge + ($request->amount*$gate->percent_charge/100);

            $usdamo = ($request->amount + $charge)/$gate->rate;

            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount;
            $depo['charge'] = $charge;
            $depo['usd_amo'] = round($usdamo,2);
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = str_random(16);
            $depo['try'] = 0;
            $depo['status'] = 0;
            Deposit::create($depo);

            Session::put('Track', $depo['trx']);

            return redirect()->route('deposit.preview');


        }
    }


    public function userdepositpreview()
    {

        $track = Session::get('Track');
        $pt = "Deposit Preview";
        $data = Deposit::where('status',0)->where('trx',$track)->first();
        return view('user.deposit.depositpreview',compact('data','pt'));
    }

    public function usertransaction()
    {
        $pt= "Transaction Log";
        $tran = Transaction::where('user_id',Auth::user()->id)->orderBy('id','desc')->orderBy('created_at', 'desc')->get();
        return view('user.deposit.transaction',compact('tran', 'pt'));
    }
    
    
    public function cardtransaction()
    {
        $pt= "Card Transaction";
        $tran = CardTrans::where('u_id',Auth::user()->id)->orderBy('id','desc')->orderBy('created_at', 'desc')->get();
        return view('user.deposit.cardtransaction',compact('tran', 'pt'));
    }

    public function usermycard()
    {
        $pt = "My Card";
        $usercard = card::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->where('status',1)->paginate(10);
        return view('user.card.mycard',compact('usercard', 'pt'));
    }

    public function userUsedCard()
    {
        $pt = "My Used Card";
        $usercard = card::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->where('status',0)->paginate(10);
        return view('user.card.mycard',compact('usercard', 'pt'));
    }

    public function userpasschnage()
    {
        $pt = "Change Password";

        return view('user.pass', compact('pt'));
    }

    public function profileIndex()
    {
        $pt = $this->seodata->profile;
        return view('user.profile', compact('pt'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'mobile' => '',
           'city' => '',
           'country' => '',
        ]);

        User::whereId(Auth::id())->update([
           'name' => $request->name,
         //  'email' => $request->email,
           'mobile' => $request->mobile,
           'city' => $request->city,
           'country' => $request->country,
        ]);

        return back()->with('success', 'Profile Updated Successfully');
    }




    public function userpasschnagesave(Request $request)
    {
        $admin = Auth::guard('web')->user();



        if(Auth::user()->logintype=='2' && Auth::user()->passset=='0'){
            if($request->password == $request->password_confirmation){
                $admin['password'] =  Hash::make($request->password);
                $admin['passset'] =  '1';
                $admin->save();
                User::find(Auth::id())->update(['passset' => '1']);
                return redirect('home')->with('success', 'Password Set Successfully');
            }else{
                return back()->with('error', 'Password confirmation not matched');
            }
        }


        if(Hash::check($request->passwordold, $admin->password))
        {
            if($request->password == $request->password_confirmation){
                $admin['password'] =  Hash::make($request->password);
                $admin->save();
                return redirect('home')->with('success', 'Password Changed');
            }else{
                return back()->with('error', 'Password confirmation not matched');
            }
        }
        else
        {
            return back()->with('error', 'Incorrect old password');
        }
    }

    public function changeusershowshats(Request $request)
    {
        $id = $request->id;
        $data = card::find($id);
        $data->status = 0;
        $data->save();
        return response($data);
    }


}
