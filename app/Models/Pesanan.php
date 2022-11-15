<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_transaksi',
        'id_produk',
        'nama_produk',
        'qty',
        'harga',
        'lama_sewa',
        'jumlah_harga',
    ];
}
