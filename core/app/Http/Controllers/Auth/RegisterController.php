<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\General;
use App\Http\Controllers\Controller;
use App\Seo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function showRegistrationForm()
    {


        $metatag = Seo::first()->metasignup;
        $pt = "Register";
        return view('auth.register', compact('pt', 'metatag'));
    }


    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users|alpha_dash',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'string|max:255',
            'city' => 'string|max:255',
            'mobile' => 'string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $gnl = General::first();

            return User::create([
                'name' => $data['name'],
                'referby' => session('referby'),
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'username' => $data['username'],
               // 'country' => $data['country'],
                'country' => '',
                'city' => '',
                'mobile' => '',
                'emailv' =>  $gnl->emailver,
                'smsv' =>  $gnl->smsver,
            ]);
      
       
    }


        public function handleGoogleCallback()
        {
            $gnl = General::first();


           // try {
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
                    'emailv' => 1,
                    'smsv' => 1,
                ]);
            
                Auth::attempt(['email' => $createdUser->email]);
            } else {
                Auth::attempt(['email' => $isUser->email]);
            }
            
              
         //   } catch (\Exception $e) {
                // Log or handle the exception
          //      return redirect('/login')->with('error', 'Authentication failed');
         //   }
        
            // Verify that the response is valid
            if (!$user->token) {
                return redirect('/login')->with('error', 'Invalid authentication response');
            }




        
        }







}
