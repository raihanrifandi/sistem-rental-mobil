<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if the table name matches the model name in snake_case)
    protected $table = 'metode_pembayaran';

    // Specify the primary key if it's different from 'id'
    protected $primaryKey = 'id_metode';

    // Allow mass assignment for the 'jenis_pembayaran' field
    protected $fillable = ['jenis_pembayaran'];
}
