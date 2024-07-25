<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'id_meja',
        'id_warung',
        'jml',
        'harga_bayar',
        'sub_total',
    ];
}
