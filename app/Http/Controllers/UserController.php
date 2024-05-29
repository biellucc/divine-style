<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function formulario_login(){
        return view('User.login');
    }

    public function login(){
        return view('welcome');
    }

    public function formulario_cadastro(){
        return view('User.form_registro');
    }
}
