<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'cart_id',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'kota',
        'kodepos',
    ];
    
    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }
}