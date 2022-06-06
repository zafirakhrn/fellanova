<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_detail';
    protected $fillable = [
        'product_id',
        'cart_id',
        'gambar',
        'quantity',
        'harga',
        'diskon',
        'subtotal',
    ];

    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    // function untuk update quantity, sama subtotal
    public function updatedetail($itemdetail, $quantity, $harga) {
        $this->attributes['quantity'] = $itemdetail->quantity + $quantity;
        $this->attributes['subtotal'] = $itemdetail->subtotal + ($quantity * $harga);
        self::save();
    }
}