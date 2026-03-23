<?php

namespace App\Models;

use App\Enums\StatusVaga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bloco extends Model
{
    protected $fillable = [
        'bloco',
        'andar',
        'vagas',
        'disponibilidade'
    ];

    protected function casts()
    {
        return [
            'disponibilidade' => StatusVaga::class
        ];
    }


    public function vagas(): HasMany
    {
        return $this->hasMany(Vaga::class, 'bloco_id');
    }
}
