<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function formulario_cadastro(){
        return view('User.form_registro');
    }

    public function store_cadastro(Request $request){
        $request->validate(
            [

            ]
        );
    }
}
