<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
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
                'cep' => 'required|string|regex: /^[0-9]{5}-[0-9]{3}$/',
                'pais' => 'required|string',
                'estado' => 'required|string',
                'cidade' => 'required|string',
                'bairro' => 'required|string',
                'endereco' => 'required|string',
                'n_residencia' => 'required|string',

                //Validação de Contato
                'email' => 'required|email|unique:users,email',
                'telefone' => 'required|string',
                'password' => 'required|string|min:8|max:13'
            ]
        );

        //Verifica se é um vendedor ou usuário e faz a devida verificação
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

        $senha = Hash::make($request->password);
        //Criando um usuário
        $usuario = User::create([
            'email' => $request->email,
            'password' => $senha,
            'telefone' => $request->telefone
        ]);

        //Verifica se é um cliente ou vendedor e cria de acordo
        if($request->input('tipoUsuario') == 'vendedor'){
            $juridico = $usuario->juridico()->create([
                'nomeEmpresarial' => $request->nomeEmpresarial,
                'cnpj' => $request->cnpj
            ]);
        }else{
            $fisico = $usuario->fisico()->create([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'genero' => $request->genero
            ]);
        }

        //Criando um endereço
        $endereco = $usuario->endereco()->create([
            'cep' => $request->cep,
            'pais' => $request->pais,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'endereco' => $request->endereco,
            'n_residencia' => $request->n_residencia
        ]);

        Auth::login($usuario, false);
        return  redirect()->route('site.dashboard');
    }

}
