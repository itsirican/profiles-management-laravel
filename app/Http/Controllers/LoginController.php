<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show() {
        return view("login.show");
    }

    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('profiles.index')->with("success", "Welcme! you logged in successfully ".$email);
        } else {
            return redirect()->back()
            ->withErrors(["email" => "Email or password is incorrect"])
            ->onlyInput("email");
        }
    }

    public function logout() {
        Session::flush();

        Auth::logout();

        return to_route('login')->with("success", "You logged out successfully");
    }
}