<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\General;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Seo;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function showLoginForm()
    {


        $pt = "Sign in";
       $metatag = Seo::first()->metalogin;
        return view('auth.login', compact('pt', 'metatag'));
    }

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username_or_email';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
   
    protected function attemptLogin(Request $request)
    {
        $field = filter_var($request->input('username_or_email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $this->guard()->attempt(
            [
                $field => $request->input('username_or_email'),
                'password' => $request->input('password'),
            ],
            $request->filled('remember')
        );
    }
    
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = filter_var($request->input('username_or_email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $request->input('username_or_email'),
            'password' => $request->input('password'),
        ];
    }




    public function redirectToGoogle()
    { 
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
        {
            $gnl = General::first();


           try {
            $user = Socialite::driver('google')->user();

            do {
                $uniqueText = mt_rand(100000000, 999999999);
            } while (User::where('username', $uniqueText)->exists());
            
            $isUser = User::where('email', $user->email)->first();
            
            if (!$isUser) {
                $createdUser = User::create([
                    'name' => $user->name,
                    'referby' => session('referby'),
                    'email' => $user->email,
                    'image' => $user->avatar,
                    'password' => bcrypt(Str::random(7)), 
                    'username' => $uniqueText,
                    'country' => '',
                    'city' => '',
                    'mobile' => '',
                    'logintype' => '2',
                    'passset' => '0',
                    'emailv' => 1,
                    'smsv' => 1,
                ]);

                $createdUserpost = User::where('email', $user->email)->first();

               


                if (!Auth::login($createdUserpost, true)) {
                    // Invalid credentials
                    return redirect()->route('home')->with('error', 'Authentication failed');
                }else{
                    return redirect('/home'); 
                }


            } else {
             
                if (!Auth::login($isUser, true)) {
                    // Invalid credentials
                    return redirect('/login')->with('error', 'Authentication failed');
                }else{
                    return redirect('/home'); 
                }

            }
            
              
            } catch (\Exception $e) {
                
                return redirect('/login')->with('error', 'Authentication failed');
            }
        
            // Verify that the response is valid
            if (!$user->token) {
                return redirect('/login')->with('error', 'Invalid authentication response');
            }




        
        }


}
