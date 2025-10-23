<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'user_id', 'dokter_id', 'cabang_id', 'pemeriksaan_id',
        'tanggal', 'jam', 'biaya_reservasi', 'total', 'status'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}