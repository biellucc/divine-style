<?php

namespace App\Http\Controllers;

use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoupaController extends Controller
{
    public function index()
    {
        $juridico = Auth::user()->juridico;
        $roupas = $juridico->roupas()->where('status', 1)->get()->sortBy('created_at');

        return view('User.Juridico.Produto.index', compact('roupas'));
    }

    public function produto(Request $request)
    {
        $produto = Roupa::find($request->id);

        return view('User.Juridico.Produto.produto', compact('produto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required', 'string', 'max:99',
            'tamanho' => 'required', 'string', 'max:3',
            'cor' => 'required', 'string', 'max:20',
            'descricao' => 'required', 'string',
            'preco' => 'required', 'numeric', 'between:1,9999',
            'imagem' => 'required', 'image', 'mimes:jpg, jpeg, png'
        ]);

        $juridico = Auth::user()->juridico;

        $requestImagem = $request->imagem;
        $extensao = $requestImagem->extension();
        $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime('now') . '.' . $extensao);
        $requestImagem->move(public_path('img/roupas'), $imagemNome);

        $roupa = $juridico->roupas()->create([
            'tipo' => $request->tipo,
            'tamanho' => $request->tamanho,
            'cor' => $request->cor,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $imagemNome,
            'status' => 1
        ]);

        return redirect()->back();
    }

    public function deletar(Request $request)
    {
        $roupa = Roupa::find($request->produto_id);
        $roupa->status = 0;
        $roupa->save();

        return redirect()->back();
    }

    public function alterar(Request $request)
    {
        $request->validate([
            'tipo' => 'required', 'string', 'max:99',
            'tamanho' => 'required', 'string', 'max:3',
            'cor' => 'required', 'string', 'max:20',
            'descricao' => 'required', 'string',
            'preco' => 'required', 'numeric', 'between:1,9999',
            'imagem' => 'required', 'image', 'mimes:jpg, jpeg, png'
        ]);

        $roupa = Roupa::find($request->produto_id);
        $input = $request->except(['_token', 'produto_id']);

        foreach ($input as $key => $value) {
            $roupa->$key = $value;
        }

        $roupa->save();

        return redirect()->back();
    }
}
