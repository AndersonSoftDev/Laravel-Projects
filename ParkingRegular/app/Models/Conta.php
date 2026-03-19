<?php

namespace App\Models;

use App\Enums\StatusActividade;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'user_id',
        'saldo',
        'activo'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
