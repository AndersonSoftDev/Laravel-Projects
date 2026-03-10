<?php

namespace App\Models;

use App\Enums\Designacao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function sector():HasMany{
        return $this->hasMany(Sector::class, 'entidade_id');
    }
}
