<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', 'VisitorController@index')->name('user.index');

use App\AdminNotif;
use App\User;


Route::get('/', function () {
   return redirect('login');
})->name('redirect');


Route::get('referral/{id}', function ($id) {
    session(['referby' => $id]);
    return redirect('/register');
})->name('refersession');





Route::get('/login/google', 'Auth\LoginController@redirectToGoogle');
Route::post('/loginc', 'Auth\LoginController@redirectToGoogle')->name('loginc');
Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback');



Route::get('/privacy_policy', 'PageController@privacy')->name('privacy');
Route::get('/refund_and_return_policy', 'PageController@rrp')->name('rrp');
Route::get('/terms', 'PageController@terms')->name('terms');


Route::get('/send_mail', 'PageController@sendmail')->name('sm');


Route::get('/about', 'VisitorController@aboutpage')->name('user.about');
Route::get('/blog', 'VisitorController@blogde')->name('blog.in');
Route::get('/blog-details/{id}', 'VisitorController@blogdetails')->name('blog.details');
Route::get('/contact', 'VisitorController@contact')->name('contact');
Route::post('/send-mail', 'VisitorController@sendmail')->name('sendmailfrmuser');
Route::post('/subscript', 'VisitorController@subscribesave')->name('subscript');

Route::get('/404', function () {
    $pt = "Page Not ound";
    return view('404', compact('pt'));
})->name('404');


Auth::routes();

//verification
Route::get('/verifiaction', 'VisitorController@verification')->name('user.verify');
Route::post('/send-vcode', 'VisitorController@sendVcode')->name('user.send-vcode');
Route::post('/email-verify', 'VisitorController@emailVerify')->name('user.email-verify');
Route::post('/sms-verify', 'VisitorController@smsVerify')->name('user.sms-verify');


//Password Reset


Route::get('/password-resetreq', 'VisitorController@resetpage')->name('password.resetreq');
Route::get('/password-otppage', 'VisitorController@otppage')->name('password.otppage');
Route::get('/password-passpage', 'VisitorController@passpage')->name('password.passpage');


Route::post('/password-sendemail', 'VisitorController@sendEmailpost')->name('password.sendemailpost');
Route::post('/password-sendotp', 'VisitorController@sendotppost')->name('password.sendotppost');
Route::post('/password-passchangereq', 'VisitorController@passchangereq')->name('password.passchangereq');

Route::get('/password-reset/{token}', 'VisitorController@resetForm')->name('password.resetform');
Route::post('/reset-password', 'VisitorController@resetPassword')->name('password.resetpassword');




//Route::post('/deposit/callcoin', 'PaymentController@coincall')->name('deposit.coincall'); //use api instead
//Route::get('/deposit/callcoin', 'PaymentController@coincallget')->name('deposit.coincall');//use api instead



//User Routes
Route::group(['middleware' => ['auth','uverify']], function() {
    Route::group(['prefix' => 'home'], function ()
    {
        
                
        Route::get('/deposit/cancel', function () {
        
            return redirect()->route('user.deposit')->with('depositcancel', 'Your previous deposit has been cancelled');
            
        })->name('canceldeposit');
        
        


        Route::get('/', 'HomeController@index')->name('home');


        Route::get('/change-password', 'HomeController@changePasswordForm')->name('user.change-password');
        Route::post('/change-password', 'HomeController@changePassword')->name('user.change-passwordpost');


        Route::get('/add_card', 'userController@add_card')->name('user.add_card');
        Route::post('/add-card-store', 'userController@usercardreqstore')->name('user.card.usercardreqstore');
        Route::get('/card-deactive/{id}', 'userController@carddeactive')->name('card.deactive');


        Route::post('/reload/{id}', 'userController@reloadcard')->name('card.reload');
        Route::post('/withdraw/{id}', 'userController@withdrawcard')->name('card.withdraw');






        Route::get('/cardlist', 'userController@usercardlist')->name('user.card.list');

        //user deposit
        Route::get('/withdraw', 'userController@userwithdraw')->name('user.withdraw');
        Route::post('/withdraw-post', 'HomeController@withdrawPost')->name('user.post.withdraw');






        Route::get('/deposit', 'userController@userdeposit')->name('user.deposit');
        Route::post('/deposit', 'userController@userdepositdatainsert')->name('deposit.data-insert');
        Route::post('/paymentprocess', 'PaymentController@deposit')->name('deposit.paymentprocess');

     //   Route::get('deposit-preview','userController@userdepositpreview')->name('deposit.preview');
     //   Route::post('deposit-confrim','PaymentController@depositConfirm')->name('user.deposit.confrim');

        //user tansantion
        Route::get('transaction','userController@usertransaction')->name('user.transaction');
        Route::get('cardtransaction','userController@cardtransaction')->name('user.cardtransaction');

        //passwod chnage
        Route::get('account','userController@userpasschnage')->name('user.change-password');
        Route::post('account','userController@userpasschnagesave')->name('user.password-update');

        //chnage status
        Route::post('chnage-status','userController@changeusershowshats')->name('chnageusercardshowstats');

        Route::get('profile','userController@profileIndex')->name('profile.index');


        Route::get('referral','userController@referral')->name('profile.referral');
        Route::post('profile','userController@profileUpdate')->name('update.profile');

    });
});







































Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('Adminneer')->group(function() {


   


       Route::get('/adminlogintouser/{id}', 'AdminController@adminlogintouser')->name('admin.adminlogintouser');

   
        Route::get('/seo', 'AdminController@seo')->name('admin.seo');
      //  Route::get('/notifvisit', 'AdminController@seo')->name('admin.notifvisit');


        Route::get('/notifvisit/{id}', function ($id) {

               $data = AdminNotif::find($id);
               $data->update(['vstat' => '1']);

                if($data->dest=='deposit'){
                    return redirect()->route('admin.depositlist');
                }elseif($data->dest=='withdraw'){
                    return redirect()->route('admin.withdrawlist');
                }elseif($data->dest=='cardad'){
                    return redirect()->route('admin.card.deactive');
                }elseif($data->dest=='cardw'){
                    return redirect()->route('admin.card.withdraw');
                }elseif($data->dest=='cardreload'){
                    return redirect()->route('admin.card.reload');
                }elseif($data->dest=='cardreq'){
                    return redirect()->route('admin.card.request');
                }else{
                    return redirect()->route('admin.card.request');
                }
           
         })->name('admin.notifvisit');
         
        Route::get('/allread', function () {

            AdminNotif::where('vstat', NULL)->update(['vstat' => 1]);

                    return redirect()->back();
            
           
         })->name('admin.allread');
         


        Route::post('/seoupdate', 'AdminController@seoupdate')->name('admin.seo.update');

        Route::get('/loginpage', 'AdminController@loginpage')->name('admin.loginpage');
        Route::post('/loginpageupdate', 'AdminController@loginpageupdate')->name('admin.loginpage.update');
        
        Route::get('/coinbasecred', 'AdminController@coinbasecred')->name('admin.coinbasecred');
        Route::post('/coinbasecred', 'AdminController@coinbasecredpost')->name('admin.coinbasecred.update');
   


        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/notices', 'AdminController@notices')->name('admin.notices');
        Route::post('/storenotice', 'AdminController@noticestore')->name('admin.notice.store');
        Route::post('/updatenotice/{id}', 'AdminController@noticeupdate')->name('admin.notice.update');
        Route::get('/deletenotice/{id}', 'AdminController@noticedelete')->name('admin.notice.delete');

       
        Route::get('/pages', 'PageController@pages')->name('admin.pages');
        Route::post('/storepage', 'PageController@pagestore')->name('admin.page.store');
        Route::post('/updatepage/{id}', 'PageController@pageupdate')->name('admin.page.update');
      //PAGE SHOULDNT BE DELETABLE  Route::get('/deletepage/{id}', 'PageController@pagedelete')->name('admin.page.delete');


        //General Settings
        Route::get('/general', 'AdminController@general')->name('admin.general');
        Route::post('/general-update', 'AdminController@generalUpdate')->name('admin.gnlupdate');

        //Payment Gateway
        Route::get('/gateway', 'AdminController@gateway')->name('admin.gateway');
        Route::post('/gateway-craete', 'AdminController@gatewayCreate')->name('admin.gatecre');
        Route::put('/gateway-update/{gateway}', 'AdminController@gatewayUpdate')->name('admin.gateup');

        //Logo-Icon
        Route::get('/logo-icon', 'AdminController@logoIcon')->name('admin.logo');
        Route::post('/logo-update', 'AdminController@logoUpdate')->name('admin.logoupdate');

        //Email-SMS
        Route::get('/email-sms', 'AdminController@emailSms')->name('admin.email');
        Route::post('/email-update', 'AdminController@emailUpdate')->name('admin.emailup');



        //User Management
        Route::get('/users', 'AdminController@userIndex')->name('admin.users');
        Route::post('/user-search', 'AdminController@userSearch')->name('admin.search-users');
        Route::get('/user/{user}', 'AdminController@singleUser')->name('admin.user-single');
        Route::get('/user-banned', 'AdminController@bannedUser')->name('admin.user-ban');
        Route::get('/mail/{user}', 'AdminController@email')->name('admin.user-email');
        Route::post('/sendmail', 'AdminController@sendemail')->name('admin.send-email');
        Route::put('/user/pass-change/{user}', 'AdminController@userPasschange')->name('admin.user-pass');
        Route::put('/user/status/{user}', 'AdminController@statupdate')->name('admin.user-status');
        Route::get('/broadcast', 'AdminController@broadcast')->name('admin.broadcast');
        Route::post('/broadcast/email', 'AdminController@broadcastemail')->name('admin.broadcast-email');

        //Password Change
        Route::get('/change-password', 'AdminController@changePassword')->name('admin.change-password');
        Route::post('/password-update', 'AdminController@updatePassword')->name('admin.password-update');

        //Register New Admin
        Route::get('/new-admin', 'AdminController@newAdmin')->name('admin.new-admin');
        Route::get('/list-admin', 'AdminController@listAdmin')->name('admin.list-admin');
        Route::post('/create-admin', 'AdminController@createAdmin')->name('admin.create-admin');



        
        //Slider Content
        Route::get('/slider-section', 'FrontendController@sliderSection')->name('admin.slidersection');
        Route::post('/slider-store', 'FrontendController@sliderStore')->name('admin.slide-store');
        Route::post('/slide-update', 'FrontendController@sliderUpdate')->name('admin.slide-update');
        Route::put('/slide-delete', 'FrontendController@sliderDestroy')->name('admin.slide-delete');

        //welcome
        Route::get('/welcome-header', 'FrontendController@welcomeheader')->name('admin.welcomeheader');
        Route::get('/video-section', 'FrontendController@welcomedetails')->name('admin.welcomedetails');
        Route::post('/welcome-details', 'FrontendController@welcomedetailssubmit')->name('admin.welcomedetails.submit');

        //our practise
        Route::get('/practise-header', 'FrontendController@practiseheader')->name('admin.practiseheader');
        Route::post('/practise-header', 'FrontendController@practiseheaderstore')->name('admin.practiseheader.submit');
        Route::get('/our-features-section', 'FrontendController@practisedetails')->name('admin.practisedetails');
        Route::post('/our-features-section', 'FrontendController@practisedetailsstore')->name('admin.features.add');
        Route::post('/practise-details-update', 'FrontendController@practisedetailsupdate')->name('admin.pracdetails-update');
        Route::put('/practise-details-delete', 'FrontendController@practisedetailsdelete')->name('admin.features.delete');

        //attorney
        Route::get('/category-header', 'FrontendController@attorneyheader')->name('admin.attorneyheader');
        Route::post('/attorney-header', 'FrontendController@attorneyheadersubmit')->name('admin.cardheader.submit');
        Route::get('/team-member-details', 'FrontendController@attorneydetails')->name('admin.attorneydetails');

        //static
        Route::get('/static', 'FrontendController@static')->name('admin.static');
        Route::put('/static/{id}', 'FrontendController@staticupdate')->name('admin.staticupdate');
        Route::post('/static', 'AdminController@staticHead')->name('admin.static.head');

        //faq
        Route::get('/faq-header', 'FrontendController@faqheader')->name('admin.faqheader');
        Route::post('/faq-header', 'FrontendController@faqheadersave')->name('admin.faq.submit');
        Route::get('/faq-section', 'FrontendController@faqhdetails')->name('admin.faqdetails');
        Route::post('/faq-update', 'FrontendController@faqupdate')->name('admin.faq-update');
        Route::post('/faq-section', 'FrontendController@faqStore')->name('admin.faq-store');
        Route::post('/faq-delete', 'FrontendController@faqDelete')->name('admin.faq.delete');

        //Social Content
        Route::get('/social-section', 'FrontendController@socialSection')->name('admin.socialsection');
        Route::post('/social-store', 'FrontendController@socialStore')->name('admin.social-store');
        Route::post('/social-update/', 'FrontendController@socialUpdate')->name('admin.social-update');
        Route::put('/social-delete', 'FrontendController@socialDestroy')->name('admin.social-delete');

        //About Content
        Route::get('/about-section', 'FrontendController@aboutSection')->name('admin.aboutsection');
        Route::post('/about-update', 'FrontendController@aboutUpdate')->name('admin.about-update');
        Route::get('/about-static', 'FrontendController@aboutstatic')->name('admin.aboutsectionstatic');
        Route::put('/about-static/{id}', 'FrontendController@aboutstaticip')->name('admin.aboutstatucup');

        //Footer Content
        Route::get('/footer-section', 'FrontendController@footerSection')->name('admin.footersection');
        Route::post('/footer-update', 'FrontendController@footerUpdate')->name('admin.footer-update');

        //user add/sub balance
        Route::get('/user-blanace/{id}', 'AdminController@addsubmoneytouser')->name('admin.useraddsubstracmont');
        Route::post('/user-blanace-save/{id}', 'AdminController@addsubmoneytousersave')->name('adminaddmonet');

        //card category
        Route::get('/card-category', 'AdminController@cardcategory')->name('admin.card.category');
        Route::post('/card-category', 'AdminController@cardcategorystore')->name('admin.category.store');
        Route::post('/card-category-edit', 'AdminController@cardcategoryupdate')->name('admin.catagoryupdate');
       
        //card categorysub
        Route::get('/card-subcategory', 'AdminController@cardsubcategory')->name('admin.card.subcategory');
        Route::post('/card-subcategory', 'AdminController@cardsubcategorystore')->name('admin.subcategory.store');
        Route::post('/card-subcategory-edit/{id}', 'AdminController@cardsubcategoryupdate')->name('admin.subcatagoryupdate');
        Route::get('/card-subcategory-deelte/{id}', 'AdminController@cardsubcategorydelete')->name('admin.subcatagory.delete');


        Route::post('/carddeactivateprocess/{id}', 'AdminController@carddeactivateprocess')->name('admin.carddeactivateprocess');
        Route::post('/carddeactivatedecline/{id}', 'AdminController@carddeactivatedecline')->name('admin.carddeactivatedecline');
        



            //card categorysub
            Route::get('/card-request', 'AdminController@cardrequest')->name('admin.card.request');
            
            Route::get('/card-reload', 'AdminController@cardreload')->name('admin.card.reload');
            Route::post('/cardreloadapprove/{id}', 'AdminController@cardreloadapprove')->name('admin.cardreloadapprove');
            Route::post('/cardreloaddecline/{id}', 'AdminController@cardreloaddecline')->name('admin.cardreloaddecline');
            

            Route::get('/card-withdraw', 'AdminController@cardwithdraw')->name('admin.card.withdraw');
            Route::post('/cardwithdrawapprove/{id}', 'AdminController@cardwithdrawapprove')->name('admin.cardwithdrawapprove');
            Route::post('/cardwithdrawdecline/{id}', 'AdminController@cardwithdrawdecline')->name('admin.cardwithdrawdecline');


            Route::get('/card-deactive', 'AdminController@carddeactive')->name('admin.card.deactive');




            Route::get('/card-transactions', 'AdminController@cardtransactions')->name('admin.card.transactions');
            Route::post('/card-transactions', 'AdminController@cardtransactionsstore')->name('admin.card.transactions.store');
            Route::get('/card-transactions-delete/{id}', 'AdminController@cardtransactionsdelete')->name('admin.card.transactions.delete');

            Route::post('/card-request', 'AdminController@cardrequeststore')->name('admin.request.store');



            
            Route::post('/card-request-delivery/{id}', 'AdminController@cardrequestdeliver')->name('admin.cardrequestdeliver');
            Route::post('/cardrequestdecline/{id}', 'AdminController@cardrequestdecline')->name('admin.cardrequestdecline');
            Route::post('/undoreq/{id}', 'AdminController@undoreq')->name('admin.undoreq');

            
            Route::get('/depositlist', 'AdminController@depositlist')->name('admin.depositlist');
            Route::post('/deposit_approve/{id}', 'AdminController@deposit_approve')->name('admin.deposit_approve');
            Route::post('/depositdecline/{id}', 'AdminController@depositdecline')->name('admin.depositdecline');

            Route::get('/withdrawlist', 'AdminController@withdrawlist')->name('admin.withdrawlist');
            Route::post('/withdraw_approve/{id}', 'AdminController@withdraw_approve')->name('admin.withdraw_approve');
            Route::post('/withdrawdecline/{id}', 'AdminController@withdrawdecline')->name('admin.withdrawdecline');



        //create card
        Route::get('/card-create', 'AdminController@createcard')->name('admin.card.create');
        Route::post('/card-create', 'AdminController@createcardstore')->name('admin.card.store');
        Route::post('/card-edit/{id}', 'AdminController@createcardupdate')->name('admin.cardupdate');
        Route::get('/card-list', 'AdminController@cardListIndex')->name('admin.card.index');
        Route::get('/card-search', 'AdminController@cardSearch')->name('admin.card.search');
        Route::post('/card-delete', 'AdminController@createcarddelete')->name('admin.carddelete');

        //transaction
        Route::get('transaction-log', 'AdminController@admintransaction')->name('admin.transaction');

        //subscriber
        Route::get('subscriber','AdminController@subscriber')->name('admin.subscriber');
        Route::post('subscriber','AdminController@subscriberheader')->name('admin.subscrive.submit');

        //blog
        Route::get('blog-header','AdminController@blogheader')->name('admin.blog.header');
        Route::post('blog-header','AdminController@blogheadersave')->name('admin.blog.head.save');
        Route::get('blog','AdminController@blog')->name('admin.blog');
        Route::post('blog','AdminController@blogsave')->name('admin.blog-store');
        Route::post('blog-update','AdminController@blogupdate')->name('admin.blog-update');
        Route::put('blog-delete','AdminController@blogdelete')->name('admin.blog.delete');

        //happy client
        Route::get('happy-client','AdminController@clientimage')->name('admin.happyclient');
        Route::post('happy-client','AdminController@clientimagesave')->name('admin.clientimagesave');
        Route::post('happy-client-update','AdminController@clientimageupdate')->name('admin.clientimageupdate');
        Route::put('happy-client-delete','AdminController@clientimagedelete')->name('admin.clientimagedelte');

        //contact
        Route::get('contact','AdminController@contact')->name('admin.contact');
        Route::post('contact','AdminController@contactupdate')->name('admin.contact.update');

        //mail-subscriber
        Route::get('broadcast-subscriber','AdminController@subsIndex')->name('mail.subscriber');
        Route::post('broadcast-subscriber','AdminController@subscribersend')->name('subcribe.mail');

        //images
        Route::get('banner','AdminController@bannerIndex')->name('admin.banner');
        Route::post('banner','AdminController@bannerUp')->name('admin.banner.updateppp');
        Route::post('breadcrumb','AdminController@breadcrumbUp')->name('admin.bred.update');
        Route::get('breadcrumb','AdminController@breadcrumbIndex')->name('admin.breadcrumb');

        ;
    });
});





























//Admin Auth
Route::prefix('Adminneer')->group(function() {
    Route::get('/', 'AdminController@showLoginForm')->name('admin.login')->middleware('guest:admin');
    Route::post('/login', 'AdminController@login')->name('admin.loginpost')->middleware('guest:admin');
    Route::get('/register', 'AdminController@showRegistrationForm')->name('admin.register')->middleware('auth:admin');
    Route::post('/register-post', 'AdminController@register')->name('admin.registerpost')->middleware('auth:admin');
    Route::post('/logout', 'AdminController@logout')->name('admin.logout');

});


