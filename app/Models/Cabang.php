<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabang extends Model
{
    use HasFactory;
    
    protected $table = 'cabangs';
    protected $fillable = [
        'nama',
        'alamat',
    ];

}
