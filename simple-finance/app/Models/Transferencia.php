<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Transferencia extends Model
{
    protected $fillable = [
        'conta_origem_id',
        'conta_destino_id',
        'valor',
        'descricao'
    ];

    public function contaOrigem(): BelongsTo
    {
        return $this->belongsTo(Contas::class, 'conta_origem_id');
    }

    public function contaDestino(): BelongsTo
    {
        return $this->belongsTo(Contas::class, 'conta_destino_id');
    }


    protected static function booted()
    {
        static::creating(function ($transferencia) {
            if (empty($transferencia->referencia)) {
                $transferencia->referencia = (string) str::uuid();
            }
        });
    }
}
