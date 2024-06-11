<?php

namespace App\Http\Controllers;

use App\Models\Cartao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartaoController extends Controller
{
    public function index(){
        $usuario = Auth::user()->fisico;
        $cartaos = Cartao::where('fisico_id', $usuario->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('User.Fisico.Cartao.cartao', compact('cartaos'));
    }

    public function controle(Request $request){
        if($request->input('action') == 'deletar'){
            return redirect()->route('cartao.delete', $request);
        }else{
            return redirect()->route('cartao.update', $request);
        }
    }

    public function delete(Request $request){
        $cartao = Cartao::find($request->cartao_id);
        $cartao->status = 0;
        $cartao->save();

        return redirect()->route('cartao.index');
    }

    public function update(){

        return redirect()->route('cartao.index');
    }
}
