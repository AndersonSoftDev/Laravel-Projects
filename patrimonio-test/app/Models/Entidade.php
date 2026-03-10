<?php

namespace App\Models;

use App\Enums\Designacao;
use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = [
        'nome',
        'codigo',
        'designacao'
    ];

    protected function casts()
    {
        return[
            'designacao' => Designacao::class
        ];
    }
}
