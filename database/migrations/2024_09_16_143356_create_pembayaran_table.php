<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->integer('jumlah');
            $table->dateTime('tanggal_pembayaran'); 
            $table->foreignId('id_penyewaan')->constrained('penyewaan', 'id_penyewaan')->onDelete('cascade');  
 	        $table->foreignId('id_metode')->constrained('metode_pembayaran', 'id_metode'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
