<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $table = 'alamat_pengiriman';
    protected $fillable = [
        'user_id',
        'status',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'kota',
        'kodepos',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}