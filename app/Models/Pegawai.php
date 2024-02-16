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

    public function berkas(): HasOne
    {
        return $this->hasOne(Berkas::class);
    }

    public function cekKelengkapanBerkas($namaKolom)
    {
        $kelengkapan = [];

        // Inisialisasi status kelengkapan berkas
        foreach ($namaKolom as $kolom) {
            $kelengkapan[$kolom] = !empty($this->berkas->{$kolom});
        }

        // Periksa apakah semua berkas yang diperlukan telah diisi
        $lengkap = !in_array(false, $kelengkapan, true);

        $lengkap = $lengkap ? ['status' => 'Lengkap', 'badge' => 'success'] : ['status' => 'Belum Lengkap', 'badge' => 'danger'];

        return $lengkap;
    } 
}
