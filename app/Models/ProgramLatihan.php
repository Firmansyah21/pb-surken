<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLatihan extends Model
{
    use HasFactory;

    protected $table = 'program_latihan';

    protected $fillable = [
        'title',
        'tanggal',
        'jam',
        'lokasi',
        'program',
        'keterangan',
        'anggota_id',
        'user_id',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
