<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';

    protected $fillable = [
        'valor',
        'status',
        'fisico_id',
        'cartao_id',
        'carrinho_id'
    ];

    protected $hidden = [
        'fisico_id',
        'cartao_id',
        'carrinho_id'
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'status' => 'boolean'
    ];

    public function fisico(){
        return $this->belongsTo(Fisico::class, 'fisico_id', 'id');
    }

    public function carrinho(){
        return $this->belongsTo(Carrinho::class, 'carrinho_id', 'id');
    }

    public function cartao(){
        return $this->belongsTo(Cartao::class, 'cartao_id', 'id');
    }

}
