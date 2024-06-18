<?php

namespace App\Http\Controllers;

use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoupaController extends Controller
{
    public function index(){
        $juridico = Auth::user()->juridico;
        $roupas = $juridico->roupas()->get()->sortBy('created_at');

        return view('User.Juridico.Produto.index', compact('roupas'));
    }

    public function produto(Request $request){
        $produto = Roupa::find($request->id);

        return view('User.Juridico.Produto.produto', compact('produto'));
    }

    public function store(Request $request){

    }

    public function deletar(Request $request){}

    public function alterar(Request $request){
        $request->validate([
            'tipo' => 'required', 'string', 'max:99',
            'tamanho' => 'required', 'string', 'max:3',
            'cor' => 'required', 'string', 'max:20',
            'descricao' => 'required', 'string',
            'preco' => 'required', 'numeric', 'between:9999,99'
        ]);

        $roupa = Roupa::find($request->produto_id);

        return redirect()->back();
    }
}
