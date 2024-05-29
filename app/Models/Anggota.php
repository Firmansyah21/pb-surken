<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $fillable = [
        'id',
        'id_anggota',
        'first_name',
        'last_name',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'alamat',
        'no_telp',
        'kategori_id',
        'user_id',
        'foto',
        'status_anggota',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }



    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function programLatihan()
    {
        return $this->hasMany(ProgramLatihan::class);
    }

    public function hasilLatihan()
    {
        return $this->hasMany(HasilLatihan::class);
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }



    public static function boot()
    {
        parent::boot();
        static::creating(function ($anggota) {
            $slug = Str::slug($anggota->nama_lengkap);
            $count = Anggota::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $anggota->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function ($anggota) {
            $original_slug = $anggota->slug;
            $slug = Str::slug($anggota->nama_lengkap);
            $count = Anggota::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $anggota->id)->count();
            $anggota->slug = $count ? "{$slug}-{$count}" : $slug;
            if ($original_slug != $anggota->slug) {
                Anggota::where('id', $anggota->id)->update(['slug' => $anggota->slug]);
            }
        });
    }

    // use SoftDeletes;
}
