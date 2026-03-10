<?php

namespace App\Models;

use App\Enums\TipoAdministracao;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    protected $fillable = [
        'provincia',
        'distrito',
        'localidade',
        'bairro',
        'endereco',
        'tipo_administracao',
        'sector_id'
    ];

    protected function casts()
    {
        return[
            'tipo_administracao' => TipoAdministracao::class
        ];
    }
}
