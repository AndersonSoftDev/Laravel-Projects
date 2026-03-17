<?php

namespace App\Models;

use App\Enums\TipoVeiculo;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'matricula',
        'tipo',
        'cor'
    ];

    protected $casts = [
        'tipo' => TipoVeiculo::class
    ];
}
