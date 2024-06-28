<?php

namespace App\Http\Controllers;

use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    protected $carrinhoController;

    public function __construct(CarrinhoController $carrinhoController)
    {
        $this->carrinhoController = $carrinhoController;
    }

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
        $temNoCarrinho = false;

        $produto = Roupa::find($request->id);

        if(Auth::check() and Auth::user()->fisico){
            $fisico = Auth::user()->fisico;
            $carrinho = $this->carrinhoController->verifica_existe($fisico);

            $temNoCarrinho = DB::table('carrinho_roupa')
            ->where('carrinho_id', $carrinho->id)
            ->where('roupa_id', $produto->id)
            ->first();
        }

        return  view('Site.produto', compact('produto', 'temNoCarrinho'));
    }
}
