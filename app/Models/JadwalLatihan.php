<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    use HasFactory;

    protected $fillable = [

        'hari',
        'jam',
        'tanggal',
        'lokasi',
        'pelatih_id',
        'kategori_id',
        'anggota_id',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
