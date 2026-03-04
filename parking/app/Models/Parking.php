<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parking extends Model
{
    protected $fillable = [
        'name',
        'address',
        'total_spots'
    ];

    protected function parkingSpot():HasMany{
        return $this->hasMany(parking_spot::class, 'parking_id');
    }
}
