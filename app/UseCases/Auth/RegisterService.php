<?php

namespace Board\UseCases\Auth;

use Board\Http\Requests\Auth\RegisterRequest;
use Board\Mail\Auth\VerifyMail;
use Board\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class RegisterService
{
    public function register(RegisterRequest $request): void
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );

        Mail::to($user->email)->send(new VerifyMail($user));
        event(new Registered($user));
    }

    public function verify($id): void
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        $user->verify();
    }
}