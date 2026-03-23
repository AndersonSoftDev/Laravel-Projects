<?php

namespace App\Models;

use App\Enums\StatusVaga;
use App\Enums\TipoVeiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaga extends Model
{
    protected $fillable = [
        'codigo',
        'tipo',
        'status',
        'bloco_id'
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
        static::creating(function ($vaga) {
            if(!empty($vaga->codigo)){
                return;
            }

            if(!$vaga->bloco_id|| !$vaga->tipo){
                throw new \Exception('Bloco e tipo de vaga são obrigatórios para a criação de códigos!');
            }

            $prefixoTipo = match ($vaga->tipo->value) {
                'CARRO'=> 'CAR',
                'MOTO'=>'MOT',
                'CAMINHAO'=>'CAM'
            };

            $contador = self::where('bloco_id', $vaga->bloco_id)
                ->where('tipo', $vaga->tipo)
                ->count()+1;

            $bloco = $vaga->bloco->first();

            $vaga->codigo = $bloco->bloco . '-' . $prefixoTipo . '-' . str_pad($contador, 3, '0', STR_PAD_LEFT);
        });
    }

    public function bloco():BelongsTo{
        return $this->belongsTo(Bloco::class, 'bloco_id');
    }
}
