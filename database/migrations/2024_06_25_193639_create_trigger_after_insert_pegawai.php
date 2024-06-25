<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerAfterInsertPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER after_insert_pegawai AFTER INSERT ON pegawais
            FOR EACH ROW
            BEGIN
                INSERT INTO berkas (pegawai_id, tahun) VALUES (NEW.id, YEAR(NOW()));
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_pegawai');
    }
}
