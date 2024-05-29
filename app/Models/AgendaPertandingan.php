<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaPertandingan extends Model
{
    use HasFactory;

    protected $table = 'agenda_pertandingan';
    protected $fillable = [
        'title',
        'tanggal_mulai',
        'tanggal_berakhir',
        'jam',
        'lokasi',
        'keterangan',
        'foto'
    ];
}
