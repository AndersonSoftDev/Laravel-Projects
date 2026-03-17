<?php

namespace App\Models;

use App\Enums\StatusVaga;
use App\Enums\TipoVeiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaga extends Model
{
    protected $fillable = [
        'codigo',
        'tipo',
        'status'
    ];


    protected $casts = [
        'tipo' => TipoVeiculo::class,
        'status' => StatusVaga::class
    ];

    public function tickets():HasMany{
        return $this->hasMany(Ticket::class, 'vaga_id');
    }

    protected static function booted()
    {
        static::creating(function($vaga){
            $vaga->codigo = "VG-" . strtoupper(uniqid());
        });
    }
}
