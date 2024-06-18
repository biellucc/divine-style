<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
        return view('User.Fisico.lista_pedido');
    }

    public function formulario_pedido(Request $request)  {
        $carrinho = Carrinho::find($request->carrinho_id);

        return view('User.Fisico.Pedido.formulario_pedido', compact('carrinho'));
    }

    public function store(Request $request) {

        dd($request);
        return redirect()->route('pedido.index');
    }
}
