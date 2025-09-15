<?php

namespace App\Models;

use app\Models\JadwalPraktek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabang extends Model
{
    use HasFactory;
    
    protected $table = 'cabangs';
    protected $fillable = [
        'nama',
        'alamat',
    ];

    public function jadwalPraktek(): HasMany
    {
        return $this->hasMany(JadwalPraktek::class);
    }
}
