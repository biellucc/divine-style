<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function formulario_cadastro(){
        return view('User.form_registro');
    }

    public function store_cadastro(Request $request){
        $request->validate(
            [
                //Validação de Endereço
                'senha' => 'required|string|min:8|max:13|confirmed',
                'cep' => 'required|string|regex: /^[0-9]{5}-[0-9]{3}$/',
                'pais' => 'required|string',
                'estado' => 'required|string',
                'bairro' => 'required|string',
                'endereco' => 'required|string',
                'n_residencia' => 'required|string',

                //Validação de Contato
                'email' => 'required|email|unique:users,email',
                'telefone' => 'required|string|regex:/^\(\d{2}\)\s\d{4,5}-\d{4}$/',
                'senha' => 'required|string|min:8|max:13|confirmed'
            ]
        );

        if($request->input('tipoUsuario') == 'vendedor'){
            $request->validate(
                [
                    'cnpj' => 'required|string|regex:: /^\d{2}.d{3}.d{3}/d{4}-d{2}$/',
                    'nomeEmpresarial' => 'required|string'
                ]
                );
        }else{
            $request->validate(
                [
                    'nome' => 'required|string',
                    'sobrenome' => 'required|string',
                    'cpf' => 'required|string|regex: /^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/',
                    'data_nascimento' => 'required|date|before_or_equal:' . Carbon::now()->subYears(16)->format('Y-m-d'),
                    'genero' => 'required|string'
                ]
                );
        }

    }

}
