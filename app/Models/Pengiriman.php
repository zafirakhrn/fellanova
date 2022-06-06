<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = [
        'cart_id',
        'estimasi',
        'user_id',
        'status',
        'tgl_pengiriman',
    ];

    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }

}