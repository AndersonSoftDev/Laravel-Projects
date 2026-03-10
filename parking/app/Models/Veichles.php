<?php

namespace App\Models;

use App\Enums\VeichleType;
use Illuminate\Database\Eloquent\Model;

class Veichles extends Model
{
    protected $fillable = [
        'plate',
        'veichle_type'
    ];

    protected function casts()
    {
        return [
            'veichle_type' => VeichleType::class
        ];
    }
}
