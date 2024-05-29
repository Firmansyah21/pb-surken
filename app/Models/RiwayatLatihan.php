<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatLatihan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_latihan';

    protected $fillable = [
        'nama_latihan',
        'lokasi',
        'tanggal',
        'durasi_latihan',
        'keterangan',
        'anggota_id',
        'user_id',
    ];
}
