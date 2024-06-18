<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    public function index(){
        return view('User.Fisico.Pedido.lista_pedido');
    }

    public function formulario_pedido(Request $request)  {
        $carrinho = Carrinho::find($request->carrinho_id);

        return view('User.Fisico.Pedido.formulario_pedido', compact('carrinho'));
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'required|email',
            'cep' => 'required|string|regex: /^[0-9]{5}-[0-9]{3}$/',
            'pais' => 'required|string',
            'estado' => 'required|string',
            'bairro' => 'required|string',
            'endereco' => 'required|string',
            'n_residencia' => 'required|string',
            'cartao' => 'required|numeric'
        ]);

        $carrinho = Carrinho::find($request->carrinho_id);
        $fisico = $carrinho->fisico()->first();

        $pedido = Pedido::create([
            'valor' => $request->valor,
            'status' => 'Em avaliação',
            'fisico_id' => $fisico->id,
            'cartao_id' => $request->cartao,
            'carrinho_id' => $request->carrinho_id
        ]);

        //$carrinho = $this->alterar_status($carrinho);

        return redirect()->route('pedido.index');
    }
}
