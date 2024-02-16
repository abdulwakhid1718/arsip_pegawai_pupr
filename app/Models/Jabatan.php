<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jabatan extends Model
{
    use HasFactory;

    public function pegawai() {
        return $this->hasMany(Pegawai::class);
    }

    public function bidang() {
        return $this->belongsToMany(Bidang::class);
    }
}
