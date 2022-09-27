<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('page.member');
        }
        return redirect()
            ->route('auth.form')
            ->withErrors([
                'email' => 'Email or Password is not correct'
            ]);
    }

    public function logout()
    {
        return Auth::logout();
    }
}
