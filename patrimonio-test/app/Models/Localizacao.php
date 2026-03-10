<?php

namespace App\Models;

use App\Enums\TipoAdministracao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function sector():BelongsTo{
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
