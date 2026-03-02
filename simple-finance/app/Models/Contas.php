<?php

namespace App\Models;

use App\Enums\TipoConta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contas extends Model
{
    protected $fillable = [
        'tipo_conta',
        'moeda', //Futuramente vamos trocar isto para uma tabela e permitir que o sistema reduza os valores tranferidos com base no cambio de cada moeda;
        'saldo',
        'activo',
        'user_id',

    ];

    protected function casts()
    {
        return [
            'tipo_conta'=>TipoConta::class
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transacao():HasMany{
        return $this->hasMany(Transacao::class, "conta_id");
    }

    //Relacao das transacoes enviadas
      public function transferenciasEnviadas(): HasMany
    {
        return $this->hasMany(Transferencia::class, 'conta_origem_id');
    }

    //Relacao das transacoes recebidas
    public function transferenciasRecebidas(): HasMany
    {
        return $this->hasMany(Transferencia::class, 'conta_destino_id');
    }

    //Metodo para controlar a adicao de valores
     public function creditar( float $valor){
        $this->increment('saldo', $valor);
    }

    //Metodo para controlar a remocao de valores
    public function debitar(float $valor){
        if($this->saldo >= $valor){
            $this->decrement('saldo', $valor);
        }else{
        abort(422, "Saldo insuficiente para a transferencia, tente novamente!");
        }
    }

}
