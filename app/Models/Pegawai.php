<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function cekKelengkapanBerkas($namaKolom, $tahun)
    {
        $berkas = Berkas::where('tahun', $tahun)->first();

        if (!$berkas) {
            // Jika tidak ada berkas untuk tahun ini, anggap belum lengkap
            return ['status' => 'Belum Lengkap', 'badge' => 'danger'];
        }

        $kelengkapan = [];

        // Inisialisasi status kelengkapan berkas
        foreach ($namaKolom as $kolom) {
            $kelengkapan[$kolom] = !empty($berkas->{$kolom});
        }

        // Periksa apakah semua berkas yang diperlukan telah diisi
        $lengkap = !in_array(false, $kelengkapan, true);

        return $lengkap ? ['status' => 'Lengkap', 'badge' => 'success'] : ['status' => 'Belum Lengkap', 'badge' => 'danger'];
    }

}
