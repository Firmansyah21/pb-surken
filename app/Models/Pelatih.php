<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelatih extends Model
{
    use HasFactory;

    protected $table = 'pelatih';

    protected $fillable = ['slug', 'first_name', 'last_name', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_telp', 'foto', 'nama_lengkap'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function jadwalLatihan()
    {
        return $this->hasMany(JadwalLatihan::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($pelatih) {
            $slug = Str::slug($pelatih->nama_lengkap);
            $count = Pelatih::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $pelatih->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function ($pelatih) {
            $original_slug = $pelatih->slug;
            $slug = Str::slug($pelatih->nama_lengkap);
            $count = Pelatih::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $pelatih->id)->count();
            $pelatih->slug = $count ? "{$slug}-{$count}" : $slug;
            if ($original_slug != $pelatih->slug) {
                Pelatih::where('id', $pelatih->id)->update(['slug' => $pelatih->slug]);
            }
        });
    }
}
