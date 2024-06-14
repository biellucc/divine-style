<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinho';

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

    public function roupas(): BelongsToMany {
        return $this->belongsToMany(Roupa::class, 'carrinho_roupa');
    }
}
