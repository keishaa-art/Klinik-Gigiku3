<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'farmasis';
    protected $fillable = [
        'nama_obat',
        'kode_obat',
        'kandungan',
        'bentuk_obat',
        'satuan',
        'pieces',
        'tgl_produksi',
        'tgl_kadaluarsa',
        'harga',
    ];
}
