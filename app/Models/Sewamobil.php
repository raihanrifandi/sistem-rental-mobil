<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewamobil extends Model
{
    use HasFactory;

    protected $table = 'sewamobil'; // Nama tabel
    protected $fillable = [
        'nama_penyewa',
        'alamat',
        'nomor_hp',
        'nama_mobil',
        'tanggal_mulai',
        'tanggal_selesai',
        'durasi',
        'total_harga',
    ];
}
