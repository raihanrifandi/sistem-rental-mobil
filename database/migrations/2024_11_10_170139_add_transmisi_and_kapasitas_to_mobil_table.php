<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mobil', function (Blueprint $table) {
            $table->enum('transmisi', ['matic', 'manual'])->after('deskripsi');
            $table->enum('kapasitas', ['2', '4', '6'])->after('transmisi');
        });
    }

    public function down(): void
    {
        Schema::table('mobil', function (Blueprint $table) {
            $table->dropColumn('transmisi');
            $table->dropColumn('kapasitas');
        });
    }
};
