<?php

namespace App\Http\Controllers;

use App\Models\{Carrinho, Fisico, Roupa};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{
    public function index()
    {
        $fisico = Auth::user()->fisico;
        $carrinho = $fisico->carrinhos()
            ->where('status', 1)
            ->first();

        return view('User.Fisico.carrinho', compact('carrinho'));
    }

    public function adicionar(Request $request)
    {
        $fisico = Auth::user()->fisico;
        $carrinho = $this->verifica_existe($fisico);
        $carrinho->roupas()->syncWithoutDetaching($request->roupa_id);

        return redirect()->back();
    }

    public function remover(Request $request)
    {
        $fisico = Auth::user()->fisico;
        $carrinho = Carrinho::where('fisico_id', $fisico->id)->where('status', 1)->first();
        $carrinho->roupas()->detach($request->roupa_id);

        return redirect()->back();
    }

    public function store(Fisico $fisico)
    {
        $carrinho = $fisico->carrinhos()->create([
            'status' => 1
        ]);

        return $carrinho;
    }

    public function verifica_existe(Fisico $fisico)
    {
        $carrinho = $fisico->carrinhos()
            ->where('status', 1)
            ->first();

        if ($carrinho == false) {
            $carrinho = $this->store($fisico);
        }

        return $carrinho;
    }

}
