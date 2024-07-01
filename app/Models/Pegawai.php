<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class);
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }

    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }

    public function cekKelengkapanBerkas($tahun, $id)
    {
        $berkas = Berkas::where('tahun', $tahun)
            ->where('pegawai_id', $id)
            ->first(); // Menggunakan first() untuk mendapatkan satu objek atau null jika tidak ada
    
        if (!$berkas) {
            // Jika tidak ada berkas untuk tahun ini, anggap belum lengkap
            return ['status' => 'Belum Lengkap', 'badge' => 'danger'];
        }
    
        // Kolom yang akan diperiksa
        $kolom = ['ktp', 'sk_pengangkatan', 'sk_pangkat', 'sk_berkala', 'sk_jabatan', 'ijazah', 'sk_tugas_ijin_belajar', 'sk_impassing', 'sk_mutasi', 'sumpah_pegawai', 'sertifikat_kediklatan', 'skp'];
    
        $kelengkapan = [];
    
        // Inisialisasi status kelengkapan berkas
        foreach ($kolom as $kolomBerkas) {
            $kelengkapan[$kolomBerkas] = !empty($berkas->{$kolomBerkas});
        }
    
        // Periksa apakah semua berkas yang diperlukan telah diisi
        $lengkap = !in_array(false, $kelengkapan, true);
    
        return $lengkap ? ['status' => 'Lengkap', 'badge' => 'success'] : ['status' => 'Belum Lengkap', 'badge' => 'danger'];
    }
    


}
