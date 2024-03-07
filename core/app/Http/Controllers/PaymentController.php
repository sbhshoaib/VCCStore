<?php

namespace App\Http\Controllers;

use App\AdminNotif;
use Illuminate\Http\Request;
use App\Deposit;
use App\DepositData;
use App\Transaction;
use Carbon\Carbon;
use Auth;
use Session;
use App\User;
use App\Gateway;
use App\General;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Charge;
use App\Lib\coinPayments;
use App\Lib\BlockIo;
use App\Lib\CoinPaymentHosted;
use App\PaymentG;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;


class PaymentController extends Controller
{


    public function deposit(Request $request)
    {


        
        $sitedata = General::first();
     
      if($request->amount<$sitedata->mindepo){
        return response()->json(['status' => 'error', 'message' => 'Sorry, request amount is less than'.$sitedata->mindepo]);
      }

        
  
        

        /*     
            Successfull =1
            Pending Confirmation = 2 
            Pending Payment = 3
            Delayed = 4
            Failed = 5
            Rejected = 6
        */
        
        $penddeposit = DepositData::where('user_id',Auth::id())->whereIn('status', [2,3])->count();

                
        if($penddeposit<3){

 
        if ($request['g_id'] == 1) {  //CoinBase Commerce
           
            $finalamount  = round(floatval($request['amount']), 2) + round(floatval($request['amount']), 2) * floatval($sitedata->depositfee);
           
            $finalamount = round($finalamount, 2);
            $fee = floatval($request['amount']) * floatval($sitedata->depositfee);
            $fee = round($fee, 2);

                    $this->validate($request,[
                        'g_id' => 'required',
                        'amount' => 'required|int|min:1',
                    ]);



            $depositdata['user_id'] = Auth::id();
            $depositdata['gateway'] = $request['g_id'];
            $depositdata['currency'] = 'USD';
            $depositdata['details'] = 'Automatic Deposit';
            $depositdata['amount'] = $request['amount'];
            $depositdata['fee'] = $fee;
            $depositdata['status'] = '0';  //IT will be changed to 3 with charge created response
            $depositdata['pstat'] = '0';
            $depositdata['trx'] =  str_random(10);
            $newDepositID = DepositData::create($depositdata)->id;



            PaymentG::find($request['g_id']);

            $coinbase = PaymentG::find($request['g_id']);
            $url = 'https://api.commerce.coinbase.com/charges';
            $array = [
                'name' => Auth::user()->name,
                'description' => "Pay to " . $sitedata->title,
                'local_price' => [
                    'amount' => $finalamount,
                    'currency' => 'USD'
                ],
                'metadata' => [
                    'dataid' => $newDepositID
                ],
                'pricing_type' => "fixed_price",
                'redirect_url' => env('APP_URL').'/home/transaction',
                'cancel_url' =>  env('APP_URL').'/home/deposit/cancel',
            ];

            $yourjson = json_encode($array);
            $ch = curl_init();
            $apiKey = $coinbase->api;
            $header = array();
            $header[] = 'Content-Type: application/json';
            $header[] = 'X-CC-Api-Key: ' . "$apiKey";
            $header[] = 'X-CC-Version: 2018-03-22';
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $yourjson);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);


            $result = json_decode($result);

            if (@$result->error == '') {
                
                $send['redirect'] = true;
                $send['redirect_url'] = $result->data->hosted_url;
                

                        DepositData::find($newDepositID)->update([
                                'payurl' => $result->data->hosted_url,
                                
                            ]);
                
                return response()->json(['status' => 'success', 'message' => 'Deposit request created. Please complete you payment', 'url' => $result->data->hosted_url]);
            } else {

                $send['error'] = true;
                $send['message'] = 'Some problem occured with api.';

                return response()->json(['status' => 'error', 'message' => 'Sorry, Something wrong. Please try again']);
               
            }

            $send['view'] = '';



        } elseif($request['g_id'] == 2) {   //MANUAL PAYMENT

            $amount = floatval($request['amount']);
            $finalamount = $amount + $amount * 0;
            
            // Ensure $finalamount is a numeric value
            if (is_numeric($finalamount)) {
                $finalamount = round($finalamount, 2);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Incorrect number format', 'url' => route('user.deposit')]);
            }
            

            
            $fee = floatval($request['amount']) * floatval(0);
            $fee = round($fee, 2);


           
                $validator = Validator::make($request->all(), [ 
                    'g_id' => 'required',
                    'amount' => 'required|int|min:1',
                    'proof' => 'file|mimes:jpeg,png,jpg,gif|max:4048',
                ]);
        
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => $validator->errors()->first(),
                       // 'url' => route('user.deposit')
                    ]);         
                }
        

                
            if($request->hasFile('proof'))
            {
                $depositdata['proof'] = uniqid() . '_' . date('YmdHis') . '.' . $request->proof->getClientOriginalExtension();
                $path = 'assets/images/proof/'.$depositdata['proof'];
                Image::make($request->proof)->resize(200, 200)->save($path);
            }
            
            $depositdata['user_id'] = Auth::id();
            $depositdata['gateway'] = $request['g_id'];
            $depositdata['currency'] = 'USD';
            $depositdata['details'] = 'Manual Deposit';
            $depositdata['amount'] = $request['amount'];
            $depositdata['fee'] = $fee;
            $depositdata['status'] = '2'; //PENDING CONFIRMATION
            $depositdata['pstat'] = '0';
            $depositdata['proof'] = $path;
            $depositdata['trx'] =  str_random(10);
            $newDepositID = DepositData::create($depositdata)->id;

            $adminntf['title'] = 'Manual Deposit Request';
            $adminntf['subtitle'] = 'A user is requested for manual payment confirmation of USD'.  $request['amount'];
            $adminntf['dest'] = 'deposit';
            AdminNotif::create($adminntf);


            return response()->json(['status' => 'success', 'message' => 'Deposit request submitted successfully', 'url' => route('user.deposit').'?history']);

        }else{
            return response()->json(['status' => 'error', 'message' => 'Payment method not found', 'url' => route('user.deposit')]);
        }
    }else{
        return response()->json(['status' => 'error', 'message' => 'Maximum Deposit limit exceed', 'url' => route('user.deposit')]);
    }


        return response()->json(['status' => 'error', 'message' => 'Something went wrong', 'url' => route('user.deposit')]);
    }

























    public function coincall(Request $request)
    {
    
        $postdata = file_get_contents("php://input");
        $res = json_decode($postdata);
 
 
 
   //  $folderPath = storage_path(''); // Change 'postdata' to your desired folder name
  //  $filename = 'postData_' . time() . '.txt'; // You can modify the filename as needed
    // Write data to a file
 //   Storage::disk('local')->put($folderPath . '/' . $filename, $postdata);
     // return 'success';
      
      if(isset($res->event->data->metadata->dataid)){
          $deposit_id = $res->event->data->metadata->dataid;
      }else{
          return 'Not authorized Payment';
      }
    
        $deposit = DepositData::find($deposit_id);
        $coinbaseAcc = PaymentG::find($deposit->gateway);


        $headers = apache_request_headers();
        $sentSign = $headers['X-Cc-Webhook-Signature'];
        $sig = hash_hmac('sha256', $postdata, $coinbaseAcc->secret);
        if ($sentSign == $sig) {
            
                                    
                                    if ($res->event->type == 'charge:confirmed' || $res->event->type == 'charge:pending') {
                                                        if ($deposit->pstat == '0') {
                                                                $userd = User::find($deposit->user_id);
                                                
                                                                $balance = $userd->balance + $deposit->amount;
                                                                $balance = floatval($balance);
                                                                $balance = round($balance, 2);
                                                                $totaldeposit = $userd->totaldeposit;
                                        
                                        
                                                            if($totaldeposit==NULL){
                                                                $totaldeposit = $deposit->amount;
                                                                $totaldeposit = floatval($totaldeposit);
                                                                $totaldeposit = round($totaldeposit, 2);
                                                            }else{
                                                                $totaldeposit = $totaldeposit + $deposit->amount;
                                                                $totaldeposit = floatval($totaldeposit);
                                                                $totaldeposit = round($totaldeposit, 2);
                                                            }
                                            
                                                          
                                                            $trns['user_id'] = $deposit->user_id;
                                                            $trns['details'] = 'Automatic Deposit';
                                                            $trns['type'] = '+';
                                                            $trns['balance'] = $balance;
                                                            $trns['amount'] = $deposit->amount;
                                                            $trns['success'] = '1';
                                                            $trns['g_id'] = '1';
                                                            $trns['category'] = 'deposit';
                                                            $trns['trx'] =  str_random(10);
                                                            Transaction::create($trns);
                                            
                                            
                                                          
                                                             //REFFERAL BONUS
                                                             if($totaldeposit>=50 && $userd->refstat == NULL && $userd->referby != NULL){
                                            
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


                                            
                                                                //DEPOSIT MAIN USER BALANCE FOR SUCCESSFULL DEPOSIT
                                                                User::whereId($deposit->user_id)->update([   //CHANGING REFERRAL BONUS STAT
                                                                    'balance' => $balance,
                                                                    'totaldeposit' => $totaldeposit,
                                                                    'refstat' => '1',
                                                                 ]);
                                                               }else{

                                                                 User::whereId($deposit->user_id)->update([      
                                                                    'balance' => $balance,
                                                                    'totaldeposit' => $totaldeposit,
                                                                 ]);

                                                                 
                                                               }
                                                             
                                                             
                                                             $deposit->update([
                                                                    'status' => '1',
                                                                    'pstat' => '1',
                                                                 ]);


                                                             
                                                                 $userddd = User::find($deposit->user_id);
                                                                 $usersend['to'] = $userddd->email;
                                                                 $usersend['title'] = 'Deposit Successfull'; 
                                                                 $maildata = [                        
                                                                     'title' => $usersend['title'], 
                                                                     'content' => 'Your deposit request of total $'.$deposit->amount.' is successfull. Thanks for your payment.', 
                                                                 ]; 
                                                                 Mail::send('mail', $maildata, function($message) use ($usersend) {
                                                                     $message->to($usersend['to']);
                                                                     $message->subject($usersend['title']);
                                                                 });


                                                                 
                                                        }else{
                                                             return 'Payment already added';
                                                        }
                               //  }elseif($res->event->type == 'charge:pending') {
                                      //        $deposit->update([
                                      //        'status' => '2',
                                         //      ]);
                                         //    return 'success';
                                   } elseif($res->event->type == 'charge:created') {
                                              $deposit->update([
                                                'status' => '3',
                                             ]);
                                             return 'success';
                                    }elseif($res->event->type == 'charge:delayed') {
                                           $deposit->update([
                                                'status' => '4',
                                             ]);
                                             
                                             return 'success';
                                    }elseif($res->event->type == 'charge:failed') {
                                        $deposit->update([
                                                'status' => '5',
                                             ]);
                                             
                                             return 'success';
                                   
                                    }
                                   else{
                                       return 'success , code 220';
                                   }
        }else{
            return 'Webhook signature doesnt match';
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
 
}
