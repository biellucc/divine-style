<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    use HasFactory;

    protected $table = 'cartao';

    protected $fillable = [
        'cvc',
        'numero',
        'validade',
        'tipo',
        'status',
        'fisico_id'
    ];

    protected $hidden = [
        'fisico_id'
    ];

    protected $casts = [
        'validade' => 'date',
        'status' => 'boolean'
    ];

    public function fisico(){
        return $this->belongsTo(Fisico::class, 'fisico_id', 'id');
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class, 'cartao_id', 'id');
    }

}
