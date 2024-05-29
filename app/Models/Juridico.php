<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juridico extends Model
{
    use HasFactory;

    protected $table = 'juridico';

    protected $fillable = [
        'cnpj',
        'nomeEmpresarial',
        'usuario_id'
    ];

    protected $hidden = [
        'usuario_id'
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function roupas(){
        return $this->hasMany(Roupa::class, 'juridico_id', 'id');
    }

}
