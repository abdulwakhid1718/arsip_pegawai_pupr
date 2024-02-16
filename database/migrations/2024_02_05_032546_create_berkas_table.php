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
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id');
            $table->string('ktp')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->string('sk_pangkat')->nullable();
            $table->string('sk_berkala')->nullable();
            $table->string('sk_jabatan')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('sk_tugas_ijin_belajar')->nullable();
            $table->string('sk_impassing')->nullable();
            $table->string('sk_mutasi')->nullable();
            $table->string('sumpah_pegawai')->nullable();
            $table->string('sertifikat_kediklatan')->nullable();
            $table->string('skp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
