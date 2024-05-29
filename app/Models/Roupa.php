<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roupa extends Model
{
    use HasFactory;

    protected $table = 'roupa';

    protected $fillable = [
        'tipo',
        'tamanho',
        'cor',
        'descricao',
        'preco',
        'juridico_id'
    ];

    protected $hidden = [
        'juridico_id'
    ];

    public function juridico(){
        return $this->belongsTo(Juridico::class, 'juridico_id', 'id');
    }

}
