<?php

namespace Board\Http\Controllers\Cabinet;

use Board\Services\Sms\SmsSender;
use Illuminate\Http\Request;
use Board\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    private $sms;

    public function __construct(SmsSender $sms)
    {
        $this->sms = $sms;
    }

    public function request(Request $request)
    {
        $user = Auth::user();

        try {
            $token = $user->requestPhoneVerification(Carbon::now());
            $this->sms->send($user->phone, 'Phone verification token: ' . $token);
        } catch (\DomainException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('cabinet.profile.phone');
    }

    public function form()
    {
        $user = Auth::user();

        return view('cabinet.profile.phone', compact('user'));
    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        try {
            $user->verifyPhone($request['token'], Carbon::now());
        } catch (\DomainException $e) {
            return redirect()->route('cabinet.profile.phone')->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.profile.home');
    }

    public function auth()
    {
        $user = Auth::user();
        if ($user->isPhoneAuthEnabled()) {
            $user->disablePhoneAuth();
        } else {
            $user->enablePhoneAuth();
        }
        return redirect()->route('cabinet.profile.home');
    }
}