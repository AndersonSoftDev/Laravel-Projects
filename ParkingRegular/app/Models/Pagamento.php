<?php

namespace App\Models;

use App\Enums\MetodoPagamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    protected $fillable = [
        'ticket_id',
        'valor',
        'metodo_pagamento',
        'conta_id'
    ];

    protected function casts()
    {
        return [
            'metodo_pagamento' => MetodoPagamento::class,
        ];
    }

    public function tickets():BelongsTo{
     return $this->belongsTo(Ticket::class, 'ticket_id');

    }

    public function conta():BelongsTo{
        return $this->belongsTo(Conta::class, 'conta_id');
    }

}
