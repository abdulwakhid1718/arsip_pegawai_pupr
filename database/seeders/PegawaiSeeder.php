<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Baca file CSV
        $file = fopen(database_path('coba.csv'), 'r');

        // Lewati baris header jika ada
        fgetcsv($file);

        $userId = 1; // Inisialisasi user_id mulai dari 1

        while (($row = fgetcsv($file)) !== false) {
            // Cari atau buat bidang
            $bidang = Bidang::firstWhere('nama_bidang', $row[2]);
            $jabatan = Jabatan::firstWhere('nama', $row[1]);

            // Masukkan data ke dalam tabel pegawai
            if ($bidang && $jabatan) {
                Pegawai::create([
                    'name' => $row[0],
                    'jenis_kelamin' => "Laki-Laki",
                    'user_id' => $userId, // Gunakan user_id yang diiterasi
                    'jabatan_id' => $jabatan->id,
                    'bidang_id' => $bidang->id,
                    'pendidikan' => $row[3]
                ]);
            }
            $userId++; // Tingkatkan nilai user_id untuk iterasi berikutnya
        }

        fclose($file);
    }
}
