<?php

namespace Board\Http\Controllers\Auth;

use Board\Http\Controllers\Controller;
use Board\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cabinet';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$user->status !== User::STATUS_ACTIVE) {
            $this->guard()->logout();
            return back()->with('error', 'You need to confirm your account. Please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }
}
