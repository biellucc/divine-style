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
        'fisico_id'
    ];

    protected $hidden = [
        'fisico_id'
    ];

    public function fisico(){
        return $this->belongsTo(Fisico::class, 'fisico_id', 'id');
    }

}
