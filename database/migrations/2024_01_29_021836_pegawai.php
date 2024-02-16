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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('bidang_id');
            $table->foreignId('jabatan_id');
            $table->string('name');
            $table->string('tempat_lahir')->nullable()->default('-');
            $table->date('tanggal_lahir')->nullable()->default(null);
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('alamat')->nullable()->default('-');
            $table->string('no_hp')->nullable()->default('-');
            $table->string('foto_profil')->nullable()->default('profile-img.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
