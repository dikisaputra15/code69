<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_meja',
        'tgl_pemesanan',
        'nama_pemesan',
        'total_bayar',
    ];
}
