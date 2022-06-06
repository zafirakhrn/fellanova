<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $fillable = [
        'cart_id',
        'subtotal',
        'total',
        'ongkir',
        'total'
    ];
    
    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }
}