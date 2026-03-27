<?php

namespace App\Models;

use App\Enums\StatusActividade;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'user_id',
        'numero_conta',
        'saldo',
        'contacto',
        'activo'
    ];

    protected static function booted()
    {
        static::creating(function ($conta) {

            if (!empty($conta->numero_conta)) {
                return;
            }

            do {
                $numero_conta = 'ACC-' . random_int(10000, 99999);
            } while (self::where('numero_conta', $numero_conta)->exists());

            $conta->numero_conta = $numero_conta;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePesquisa($query, $termo){
        return $query->where('numero_conta', 'LIKE', "%{$termo}%")
        ->orWhereHas('user', function($data) use ($termo){
            $data->where('name', 'LIKE', "%{$termo}%")
            ->orWhere('email', 'LIKE', "%{$termo}%");
        });
    }

}
