<?php

namespace App\Http\Controllers;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'slug_kategori',
        'deskripsi_kategori',
        'status',
    ];

    public function user() {//user yang menginput data kategori
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}