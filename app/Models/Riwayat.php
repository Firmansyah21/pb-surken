<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_latihan';

    protected $fillable = [
        'anggota_id',
        'tanggal',
        'lokasi',
        'lawan',
        'skor',
        'status',
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
