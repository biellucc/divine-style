<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisico extends Model
{
    use HasFactory;

    protected $table = 'fisico';

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'genero',
        'data_nascimento',
        'usuario_id'
    ];

    protected $hidden = [
        'usuario_id'
    ];

    protected $casts = [
        'data_nascimento' => 'date'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function cartao(){
        return $this->hasMany(Cartao::class, 'fisico_id', 'id');
    }

    public function carrinhos(){
        return $this->hasMany(Carrinho::class, 'fisico_id', 'id');
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class, 'fisico_id', 'id');
    }
}
