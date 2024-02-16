<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bidang extends Model
{
    use HasFactory;

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class);
    }

    public function jabatan() {
        return $this->belongsToMany(Jabatan::class);
    }
}
