<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function formulario_login(){
        return view('User.login');
    }

    public function login(Request $request){

        $data = $request->validate([
                'email' => 'required|email|exists:users,email',
                'senha' => 'required'
        ]);

        $data['senha'] = Hash::make($data['senha']);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->senha], false)){
            return redirect()->route('site.dashboard');
        }else{
            return back()->withErrors(['emailEmail => ou senha inválidos!']);
        }

    }

    public function formulario_cadastro(){
        return view('User.form_registro');
    }
}
