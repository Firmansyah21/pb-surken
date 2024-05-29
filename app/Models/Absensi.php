<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'anggota_id',
        'user_id', // add this line
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'keterangan',
        'foto',
        'status',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function riwayatLatihan()
    {
        return $this->belongsTo(RiwayatLatihan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
