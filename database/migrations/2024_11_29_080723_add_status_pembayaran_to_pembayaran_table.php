<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->enum('status_pembayaran', ['pending', 'lunas', 'gagal'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn('status_pembayaran');
        });
    }

};
