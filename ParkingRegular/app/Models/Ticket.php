<?php

namespace App\Models;

use App\Enums\StatusTicket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    protected $fillable = [
        'codigo',
        'veiculo_id',
        'vaga_id',
        'entrada',
        'saida',
        'valor_pago',
        'status'
    ];

    protected $casts = [
        'status' => StatusTicket::class
    ];

    public function veiculo():BelongsTo{
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }

    public function vaga():BelongsTo{
        return $this->belongsTo(Vaga::class, 'vaga_id');
    }

    public function pagamentos():HasOne{
        return $this->hasOne(Pagamento::class, 'ticket_id');
    }

    protected static function booted()
    {
        static::creating(function($ticket){
            $ticket->codigo = 'TCKT-' . strtoupper(uniqid());
        });
    }
}
