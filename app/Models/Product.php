<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'mobil';

    protected $primaryKey = 'id_mobil';

    protected $fillable = [
        'merk',
        'model',
        'tahun',
        'plat',
        'harga_sewa',
        'status',
        'deskripsi',
    ];

    public $timestamps = true;

  
    public static function jumlahTersewa()
    {
        return self::where('status', 'rented')->count();
    }


    public static function jumlahTersedia()
    {
        return self::where('status', 'available')->count();
    }
}
