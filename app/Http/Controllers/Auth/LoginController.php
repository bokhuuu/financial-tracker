<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('incomes.index')
                ->with('success', 'Logged in');
        } else {
            return redirect()->route('login.form')
                ->with('error', 'Invalid credentials')
                ->withInput();
        }
    }


    public function logoutUser()
    {
        Auth::logout();

        return redirect()->route('login.form')
            ->with('success', 'Logged out');
    }
}
