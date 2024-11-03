<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'total_biaya',
        'status_penyewaan',
        'id_mobil',
        'id_pengguna',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function mobil()
    {
        return $this->belongsTo(Product::class, 'id_mobil');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}
