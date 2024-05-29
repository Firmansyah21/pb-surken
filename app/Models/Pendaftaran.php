<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $dates = ['tanggal_lahir'];
    protected $table = 'pendaftaran';
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'akte',
        'ijazah',
        'foto'
    ];
}
