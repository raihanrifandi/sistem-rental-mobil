<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUpdateMobilStatusTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Menjalankan raw SQL untuk membuat trigger
        DB::unprepared('
            CREATE TRIGGER update_mobil_status
            AFTER UPDATE ON penyewaan
            FOR EACH ROW
            BEGIN
                -- Mengecek apakah status penyewaan adalah completed atau canceled
                IF NEW.status_penyewaan IN ("completed", "canceled") THEN
                    -- Memperbarui status mobil menjadi "available" jika status penyewaan sudah selesai atau dibatalkan
                    UPDATE mobil
                    SET status = "available"
                    WHERE id_mobil = NEW.id_mobil AND status = "rented";
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menjalankan raw SQL untuk menghapus trigger jika migration di-rollback
        DB::unprepared('
            DROP TRIGGER IF EXISTS update_mobil_status;
        ');
    }
}
