<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kd_transaksi',
        'nama_pelanggan',
        'alamat_pelanggan',
        'noHp_pelanggan',
        'identitas',
        'total_harga',
        'status',
        'status_pembayaran',
        'tgl_lunas',
        'tgl_pesan',
        'tgl_ambil',
        'tgl_kembali'
    ];
}
