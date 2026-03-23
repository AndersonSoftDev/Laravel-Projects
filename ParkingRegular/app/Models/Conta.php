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
        'activo'
    ];

    protected static function booted()
    {
        static::creating(function ($conta) {

            if (!empty($conta->codigo)) {
                return;
            }

            do {
                $codigo = 'ACC-' . random_int(10000, 99999);
            } while (self::where('codigo', $codigo)->exists());

            $conta->codigo = $codigo;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
