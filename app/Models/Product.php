<?php
namespace App\Http\Controllers;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'stock',
        'gambar',
        'panjang',
        'lebar',
         'tinggi',
         
        'kategori_id',
        'deskripsi',
    ];
}
