<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemeriksaan extends Model
{
    protected $table = 'pemeriksaans';
    protected $fillable = [
        'nama',
        'detail',
        'harga',
        'gambar'
    ];
}
