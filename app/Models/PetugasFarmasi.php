<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasFarmasi extends Model
{
    use HasFactory;

    protected $table = 'petugas_farmasis';

    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'no_izin',
        'no_telepon',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
