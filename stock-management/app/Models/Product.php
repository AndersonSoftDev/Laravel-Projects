<?php

namespace App\Models;

use App\Enums\Availability;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
     protected $primaryKey = 'product_id';

    protected $fillable = [
        "name",
        "price",
        "quantity",
        "availability"
    ];

    protected function casts()
    {
        return[
            'availability' => Availability::class
        ];
    }

    public function setStockAvailability(): void{
        $this->availability =
            $this->quantity > 0
            ? Availability::IN_STOCK
            : Availability::OUT_OF_STOCK;
    }

    public function requisition(): HasMany{
        return $this->hasMany(Requisition::class, 'product_id');
    }
}
