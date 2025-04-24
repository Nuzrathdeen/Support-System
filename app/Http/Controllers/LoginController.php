<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function register(){
        return view ('auth.register');
    }

    public function registeru(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
    public function login(){

        return view ('auth.login');

    }


    // public function authenticate(Request $request) {

    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);

    //     if(Auth::attempt($creadentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/');
    //     }

    //     returnback()->with('error', 'The provided credentials do not match our records.');
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/tickets');
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }



    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidation();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
