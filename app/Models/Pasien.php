<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasiens';

    protected $fillable = [
        'user_id',
        'name',
        'no_rm',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telepon',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
