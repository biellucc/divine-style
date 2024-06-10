<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(){
        return view('User.Juridico.vendas');
    }
}
