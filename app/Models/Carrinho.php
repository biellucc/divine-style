<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'fisico_id'
    ];

    protected $hidden = [
        'fisico_id'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function fisico(){
        return $this->belongsTo(Fisico::class, 'fisico_id', 'id');
    }

    public function pedido() {
        return $this->hasOne(Pedido::class, 'carrinho_id', 'id');
    }

    public function roupas(){}
}
