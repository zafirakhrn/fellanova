<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $table = 'konfirmasi';
    protected $fillable = [
        'no_invoice',
        'cart_id',
        'user_id',
        'bukti_transfer',
        'total',
        'status',
        'bank',
        'atas_nama',
    ];

    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }

}