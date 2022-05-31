<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 5; // Default is 1

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    

    public function username(){

        return 'pj_number';
        
    }


    public function login(Request $request){

        // update the login attempts

        $user = User::where('pj_number', $request->pj_number)->first();
        $user->login_attempts = $user->login_attempts + 1;
        $user->save();
        

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        // save attempt in users table column login_attempts
    


        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

  

   
    protected function authenticated(Request $request, $user)
    {

        
        if ($user->default_password_set == 1) 
        
        {
            return redirect()->route('user_change_password_form', $user->id )->with('status', 'Please change your password.');

        }

        
        else
        {
            return redirect()->route('dashboard')->with('status', 'You are logged in!');
        }



    }


}
