<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id('id_penyewaan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('total_biaya');
            $table->enum('status_penyewaan', ['pending', 'on-going', 'completed', 'canceled'])->default('pending'); 
            $table->foreignId('id_mobil')->constrained('mobil', 'id_mobil');
            $table->foreignId('id_pengguna')->constrained('users', 'id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
