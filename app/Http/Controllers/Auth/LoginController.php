<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use user;
use Auth;
use Illuminate\Http\Request;

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
    protected function authenticated(Request $request, $user){
    if ($user->hasRole('superadministrator')) {
        return redirect('/admin');
    }
     elseif ($user->hasRole('administrator')) {
        return redirect('/administrator');
    }
    return redirect('/user');
}
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*public function redirectPath(){
        if(\Auth::user()->superadministrator()){
        return redirect('/admin');
        }
        elseif(\Auth::user()->administrator()) {
             return redirect('/administrator');
        }
        return property_exists($this, 'redirectTo')? $this->redirectTo: '/home';
    }
    */
    public function logout(Request $request) {
       Auth::logout();
       return redirect('/login');
}
protected function hasTooManyLoginAttempts(Request $request)
{
    return $this->limiter()->attempts($this->throttleKey($request));
}
}
