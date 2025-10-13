<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'user_id',          // pasien yang melakukan reservasi
        'dokter_id',        // dokter yang dipilih
        'cabang_id',        // cabang tempat reservasi
        'tanggal',
        'jam',
        'pemeriksaan_id',   // pemeriksaan yang dipilih
        'biaya_reservasi',
        'total',
        'status',
    ];

    // 🔹 Relasi ke pasien
    public function pasien()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔹 Relasi ke dokter
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    // 🔹 Relasi ke cabang
    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    // 🔹 Relasi ke pemeriksaan
    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}
