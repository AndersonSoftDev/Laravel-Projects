<?php

namespace App\Models;

use App\Enums\TipoVeiculo;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $fillable = [
        'tipo',
        'valor'
    ];

    protected function casts()
    {
        return[
            'tipo' => TipoVeiculo::class
        ];
    }
}


