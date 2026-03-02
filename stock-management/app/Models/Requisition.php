<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requisition extends Model
{
    protected $primaryKey = 'requisition_id';

    protected $fillable = [
        'name',
        'quantity',
        'product_id'
    ];

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function calculateTotalPrice(){
        $price = $this->product->price;
        $quantity = $this->quantity;

        $this->total = $price * $quantity;
    }

    public function reduceQuantityBasedOnOrder(){
        $product = $this->product;

        $requestedQuantity = $this->quantity;
        $availableQuantity = $product->quantity;

        if($requestedQuantity <= $availableQuantity){
            $newQuantity = $availableQuantity - $requestedQuantity;

            $product->quantity = $newQuantity;

            $product->setStockAvailability();

            $product->save();
        }else{
            abort(400, "Stock insuficiente. Somente {$availableQuantity} disponíveis em stock.");
        }

    }
}
