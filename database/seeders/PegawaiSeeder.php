<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\Bidang;

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

        while (($row = fgetcsv($file)) !== false) {
            // Cari atau buat bidang
            $bidang = Bidang::firstOrCreate(['nama_bidang' => $row[4]]);

            // Masukkan data ke dalam tabel pegawai
            Pegawai::create([
                'name' => $row[0],
                'jenis_kelamin' => "Laki-Laki",
                'jabatan' => $row[2],
                'bidang_id' => $bidang->id,
            ]);
        }

        fclose($file);
    }
}
