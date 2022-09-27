<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('page.admin');
        }
        return redirect()
            ->route('auth_admin.form')
            ->withErrors([
                'email' => 'Email or Password is not correct'
            ]);
    }

    public function logout()
    {
        return Auth::guard('admin')->logout();
    }
}
