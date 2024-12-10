<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnusedColumnsFromUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'alamat_email')) {
                $table->dropColumn('alamat_email');
            }
            if (Schema::hasColumn('users', 'two_factor_secret')) {
                $table->dropColumn('two_factor_secret');
            }
            if (Schema::hasColumn('users', 'two_factor_recovery_codes')) {
                $table->dropColumn('two_factor_recovery_codes');
            }
            if (Schema::hasColumn('users', 'two_factor_confirmed_at')) {
                $table->dropColumn('two_factor_confirmed_at');
            }
            if (Schema::hasColumn('users', 'phone_number')) {
                $table->dropColumn('phone_number');
            }
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('alamat_email')->nullable();
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
        });
    }
}
