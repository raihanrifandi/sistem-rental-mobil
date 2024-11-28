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
            $table->time('waktu_penjemputan')->after('tanggal_selesai'); 
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('dokumen_wajib')->nullable()->after('no_telepon'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            $table->dropColumn('waktu_penjemputan');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dokumen_wajib');
        });
    }
};
