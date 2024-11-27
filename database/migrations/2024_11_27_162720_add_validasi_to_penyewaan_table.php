<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            $table->enum('validasi', ['accept', 'reject'])->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            $table->dropColumn('validasi');
        });
    }
};
