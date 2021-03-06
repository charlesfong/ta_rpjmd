<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\UserCategory;
use Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::guard('web')->logout(); //default - web. Users table
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:6',
            'password'=>'required',
        ]);
        if (Auth::guard()->attempt(['username'=>$request->username,'password'=>$request->password],$request->remember)){
            $user = $this->guard()->getLastAttempted();
        }
        else
        {
            echo $request->username." ".$request->password;
        }
        return redirect()->back()->withInput($request->only('username','remember'));
    }
}
