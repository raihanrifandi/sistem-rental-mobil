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
            $table->enum('status_penyewaan', ['pending', 'confirmed', 'rejected', 'on-going', 'completed', 'canceled'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            $table->enum('status_penyewaan', ['pending', 'confirmed', 'rejected', 'on-going', 'completed', 'canceled'])->change();
        });
    }
};