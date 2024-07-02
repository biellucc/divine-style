<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{

    protected $carrinhoController;

    public function __construct(CarrinhoController $carrinhoController)
    {
        $this->carrinhoController = $carrinhoController;
    }

    public function index()
    {
        $fisico = Auth::user()->fisico;
        $pedidos = Pedido::where('fisico_id', $fisico->id)
            ->get();

        return view('User.Fisico.Pedido.lista_pedido', compact('pedidos'));
    }

    public function formulario_pedido(Request $request)
    {
        $this->carrinhoController->adicionar($request);
        $fisico = Auth::user()->fisico;
        $carrinho = $fisico->carrinhos()->where('status', 1)->first();

        return view('User.Fisico.Pedido.formulario_pedido', compact('carrinho'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'cep' => 'required|string|regex: /^[0-9]{5}-[0-9]{3,4}$/',
            'pais' => 'required|string',
            'estado' => 'required|string',
            'cidade' => 'required|string',
            'bairro' => 'required|string',
            'endereco' => 'required|string',
            'n_residencia' => 'required|string',
            'cartao' => 'required'
        ]);
        $carrinho = Carrinho::find($request->carrinho_id);
        $fisico = Auth::user()->fisico;

        $pedido = Pedido::create([
            'valor' => $request->valor,
            'status' => 'Em avaliação',
            'fisico_id' => $fisico->id,
            'cartao_id' => $request->cartao,
            'carrinho_id' => $request->carrinho_id
        ]);

        $carrinho->status = 0;
        $carrinho->save();

        $endereco = Endereco::find($fisico->usuario_id);
        $enderecoInput = $request->only(['cep', 'pais','estado', 'cidade', 'bairro', 'endereco', 'n_residencia']);
        foreach($enderecoInput as $key => $value){
            $endereco->$key = $value;
        }
        $endereco->save();

        $fisicoInput = $request->only(['nome', 'sobrenome']);
        foreach($fisicoInput as $key => $value){
            $fisico->$key = $value;
        }
        $fisico->save();

        $usuario = User::find($fisico->usuario_id);
        $usuarioInput = $request->only(['email', 'telefone']);
        foreach($usuarioInput as $key => $value){
            $usuario->$key = $value;
        }
        $usuario->save();

        return redirect()->route('pedido.pedido', ['id' => $pedido->id]);
    }

    public function pedido(Request $request)
    {
        $pedido = Pedido::find($request->id);
        $carrinho = Carrinho::find($pedido->carrinho_id);

        return view('User.Fisico.Pedido.pedido', compact('pedido', 'carrinho'));
    }
}
