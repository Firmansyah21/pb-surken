<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilLatihan extends Model
{
    use HasFactory;

    protected $table = 'hasil_latihan';

    protected $fillable = [
        'anggota_id',
        'lawan_id',
        'tanggal',
        'lokasi',
        'skor_anggota',
        'skor_lawan',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function lawan()
    {
        return $this->belongsTo(Anggota::class, 'lawan_id');
    }
}
