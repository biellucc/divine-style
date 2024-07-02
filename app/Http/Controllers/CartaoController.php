<?php

namespace App\Http\Controllers;

use App\Models\Cartao;
use App\Models\Fisico;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartaoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user()->fisico;
        $cartaos = Cartao::where('fisico_id', $usuario->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('User.Fisico.Cartao.cartao', compact('cartaos'));
    }

    public function formulario()
    {
        return view('User.Fisico.Cartao.store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|regex:/^[0-9]{4}.[0-9]{4}.[0-9]{4}.[0-9]{4}$/',
            'cvc' => 'required|string|regex:/^[0-9]{3,4}$/',
            'validade' => 'required|after_or_equal:'. Carbon::now()->addMonth(1)->format('y-m-d')
        ]);

        $fisico = Auth::user()->fisico;
        $cartao = $fisico->cartao()->create([
            'numero' => $request->numero,
            'cvc' => $request->cvc,
            'validade' => $request->validade,
            'tipo' => $request->tipo,
            'status' => 1
        ]);

        return redirect()->route('cartao.index');
    }

    public function controle(Request $request)
    {
        if ($request->input('action') == 'deletar') {
            return redirect()->route('cartao.delete', $request);
        } else {
            return redirect()->route('cartao.update', $request);
        }
    }

    public function delete(Request $request)
    {
        $cartao = Cartao::find($request->cartao_id);
        $cartao->status = 0;
        $cartao->save();

        return redirect()->route('cartao.index');
    }

    public function update(Request $request)
    {
        $input = $request->only(['cvc', 'numero', 'validade', 'tipo']);
        $cartao = Cartao::find($request->cartao_id);

        foreach ($input as $key => $value) {
            $cartao->$key = $value;
        }

        $cartao->save();

        return redirect()->route('cartao.index');
    }
}
