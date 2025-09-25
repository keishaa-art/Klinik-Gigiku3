<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'email_verification_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function redirectTo()
    {
        return match ($this->role) {
            'Admin' => route('admin.dashboard'),
            'Dokter' => route('dokter.dashboard'),
            'Farmasi' => route('farmasi.dashboard'),
            'Pasien' => route('pasien.dashboard'),
            default => '/',
        };
    }


    public function jadwalPrakteks()
    {
        return $this->hasMany(JadwalPraktek::class);
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    // public function dokter()
    // {
    //     return $this->hasOne(Dokter::class, 'user_id');
    // }
  
    public function pasien()
    {
        return $this->hasOne(Pasien::class);
    }
    public function dokter()
    {
        return $this->hasOne(Dokter::class);
    }
    public function petugasFarmasi()
    {
        return $this->hasOne(PetugasFarmasi::class);
    }

}
