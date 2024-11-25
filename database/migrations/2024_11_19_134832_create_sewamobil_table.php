<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaMobilTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sewa-mobil', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_penyewa'); // Nama penyewa
            $table->string('alamat'); // Alamat penyewa
            $table->string('nomor_hp'); // Nomor HP penyewa
            $table->string('nama_mobil'); // Nama mobil
            $table->date('tanggal_mulai'); // Tanggal mulai sewa
            $table->date('tanggal_selesai'); // Tanggal selesai sewa
            $table->integer('durasi'); // Durasi sewa (hari)
            $table->decimal('total_harga', 10, 2); // Total harga sewa
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewamobil');
    }
}
