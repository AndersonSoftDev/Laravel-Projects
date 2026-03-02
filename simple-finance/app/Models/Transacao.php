<?php

namespace App\Models;

use App\Enums\TipoConta;
use App\Enums\TipoTransacao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transacao extends Model
{
    protected $fillable = [
        'tipo',
        'valor',
        'descricao',
        'referencia',
        'conta_id'
    ];

    public function casts()
    {
        return[
            'tipo' => TipoTransacao::class
        ];
    }

    public function conta():BelongsTo{
        return $this->belongsTo(Contas::class);
    }

}
