<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('merk');
            $table->string('model');
            $table->year('tahun');
            $table->string('plat')->unique();
            $table->integer('harga_sewa');
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available'); 
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
