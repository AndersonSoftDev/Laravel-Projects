<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sector extends Model
{
    protected $fillable = [
        'entidade_id',
        'nome',
        'codigo'
    ];

    public function entidade():BelongsTo{
        return $this->belongsTo(Entidade::class, 'entidade_id');
    }

    public function localizacao():HasOne{
        return $this->hasOne(Sector::class, 'sector_id');
    }
}
