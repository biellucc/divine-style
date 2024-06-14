<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $casts = [
        'preco' => 'decimal:2'
    ];

    public function juridico(){
        return $this->belongsTo(Juridico::class, 'juridico_id', 'id');
    }

    public function carrinhos(): BelongsToMany{
        return $this->belongsToMany(Carrinho::class, 'carrinho_roupa');
    }

}
