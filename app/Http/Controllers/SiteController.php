<?php

namespace App\Http\Controllers;

use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function dashboard(){
        $roupas = Roupa::where('status', 1)->get();

        return view('Site.welcome', compact('roupas'));
    }

    public function sobre_site(){
        return view('Site.sobre');
    }

    public function ajuda(){
        return view('Site.ajuda');
    }

    public function perquntas_frequentes(){
        return view('Site.perguntas_frequentes');
    }

    public function produto(Request $request){
        $produto = Roupa::find($request->id);

        return  view('Site.produto', compact('produto'));
    }
}
