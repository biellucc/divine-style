<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('User.login');
    }

    public function login(Request $request){

         $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $check_box = $request->filled('remember');
        $authenticated = Auth::attempt($credentials, $check_box);

        if(!$authenticated){
            return redirect()->route('login.index')->withErrors(['error' => 'Email ou senha não existem']);
        }

        return redirect()->route('site.dashboard');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('site.dashboard');
    }

}
