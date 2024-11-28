<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';
    protected $primaryKey = 'id_penyewaan';

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_penjemputan',
        'total_biaya',
        'status_penyewaan',
        'id_mobil',
        'user_id',
    ];

    public function setWaktuPenjemputanAttribute($value)
    {
        $this->attributes['waktu_penjemputan'] = date('H:i:s', strtotime($value));
    }

    public function mobil()
    {
        return $this->belongsTo(Product::class, 'id_mobil');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
