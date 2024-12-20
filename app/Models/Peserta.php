<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'nama_peserta',
        'no_wa',
        'email',
        'alamat',
        'status',
    ];
}
