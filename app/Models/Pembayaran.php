<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if table name follows Laravel's plural convention)
    protected $table = 'pembayaran';

    // Define the primary key (optional if it's 'id' by default)
    protected $primaryKey = 'id_pembayaran';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'jumlah',
        'tanggal_pembayaran',
        'status_pembayaran',
        'id_penyewaan',
        'id_metode',
        'snap_token',
        'token_expiration',
    ];

    // Define the relationships

    // A pembayaran belongs to a penyewaan (sewa transaction)
    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_penyewaan', 'id_penyewaan');
    }

    // A pembayaran belongs to a metode pembayaran (payment method)
    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode');
    }
}
