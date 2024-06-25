<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class DashboardController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $pegawai = Pegawai::findOrFail($id);

        // Ambil daftar kolom dari struktur tabel Pegawai dan table berkas
        $columnsToCheck = Schema::getColumnListing('pegawais');
        $kolomBerkas = Schema::getColumnListing('berkas');

        // Kolom-kolom yang tidak diinginkan
        $kolomBerkasTidakDiinginkan = ['id', 'pegawai_id', 'created_at', 'updated_at'];
        
        // Menghilangkan kolom yang tidak diinginkan dari array nama kolom
        $kolomBerkas = array_diff($kolomBerkas, $kolomBerkasTidakDiinginkan);

        // Cek Kelengkapan Berkas
        $pegawai->kelengkapan_berkas = $pegawai->cekKelengkapanBerkas($kolomBerkas);

        // Inisialisasi status profil
        $statusProfil = ['Lengkap', 'success'];

        // Periksa setiap kolom
        foreach ($columnsToCheck as $column) {
            // Periksa jika nilai kolom mengandung '-'
            $firstCharacter = substr($pegawai->$column, 0, 1);

            if ($firstCharacter === '-') {
                // Jika nilai kolom mengandung '-', tandai profil sebagai 'Belum Lengkap'
                $statusProfil = ['Belum Lengkap', 'danger'];
                // Keluar dari loop karena sudah ada satu kolom yang belum lengkap
                break;
            }
        }

        return view('admin.dashboard', [
            'status' => $statusProfil, 
            'kelengkapan_berkas' => $pegawai->kelengkapan_berkas,
        ]);
    }
}
