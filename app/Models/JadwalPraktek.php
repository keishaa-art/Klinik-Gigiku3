<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cabang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPraktek extends Model
{
    use HasFactory;

    protected $table = 'jadwal_prakteks';
    protected $fillable = ['user_id','hari', 'cabang_id', 'tanggal', 'jam'];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }
}