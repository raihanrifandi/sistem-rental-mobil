<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            // Drop foreign key constraint dan kolom id_pengguna
            $table->dropForeign(['id_pengguna']);
            $table->dropColumn('id_pengguna');

            // Tambahkan kolom user_id dan relasikan dengan tabel users
            $table->unsignedBigInteger('user_id')->after('id_mobil');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            // Hapus kolom user_id dan relasi dengan tabel users
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Tambahkan kembali kolom id_pengguna dan relasi dengan tabel pengguna
            $table->foreignId('id_pengguna')->constrained('pengguna', 'id_pengguna');
        });
    }
};
