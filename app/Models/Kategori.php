<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'usia'];

    protected $table = 'kategoris';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }

    public function pelatih()
    {
        return $this->hasMany(Pelatih::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function jadwalLatihan()
    {
        return $this->hasMany(JadwalLatihan::class);
    }
}
