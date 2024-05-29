<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
    public function jadwalLatihan()
    {
        return $this->belongsTo(JadwalLatihan::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function programLatihan()
    {
        return $this->hasMany(ProgramLatihan::class);
    }



    use HasRoles;
}
