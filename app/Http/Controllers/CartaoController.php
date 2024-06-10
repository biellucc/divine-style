<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaoController extends Controller
{
    public function index(){
        return view('User.Fisico.lista_cartao');
    }
}
