<?php

namespace App\Models;

use App\Enums\Parking_status;
use App\Enums\type;
use App\Enums\Type_spot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class parking_spot extends Model
{
    protected $fillable = [
        'parking_id',
        'code',
        'type',
        'status'
    ];

    protected function casts()
    {
        return[
            'type' => Type_spot::class,
            'status' => Parking_status::class
        ];
    }

    public function parking():BelongsTo{
        return $this->BelongsTo(Parking::class);
    }
}
