<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';
    protected $fillable = [
        'title',
        'tanggal',
        'lokasi',
        'juara',
        'tingkat',
        'penyelenggara',
        'user_id',
        'anggota_id',
        'kategori_id',
        'image',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
