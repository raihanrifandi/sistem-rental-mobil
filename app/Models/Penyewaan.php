<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'penyewaan';

    // Define the primary key
    protected $primaryKey = 'id_penyewaan';

    // Specify the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'total_biaya',
        'status_penyewaan',
        'id_mobil',
        'id_pengguna',
    ];

    // Define the relationship with Mobil (assuming you have a Mobil model)
    public function mobil()
    {
        return $this->belongsTo(Product::class, 'id_mobil');
    }

    // Define the relationship with Pengguna (assuming you have a Pengguna model)
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

}
