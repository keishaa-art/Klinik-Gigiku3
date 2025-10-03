<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Dokter;          
use App\Models\User;
use App\Models\Cabang;
use App\Models\JadwalPraktek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPraktekController extends Controller
{
    public function index()
{
    if (auth()->user()->role == 'admin') {
        $jadwal = JadwalPraktek::with(['dokter', 'cabang', 'user'])->get();
    } else {
        $jadwal = JadwalPraktek::with(['dokter', 'cabang'])
                    ->where('user_id', auth()->id())
                    ->get();
    }
    return view('Dokter.Jadwal.index', compact('jadwal'));
}

public function create()
{
    $user = auth()->user();

    if ($user->role == 'admin') {
        $dokters = Dokter::with('cabang')->get();
    } else {
        $dokters = null; // dokter ga pilih, otomatis ambil dirinya
    }

    return view('Dokter.Jadwal.create', compact('dokters','user'));
}

public function store(Request $request)
{
    $user = auth()->user();

    if ($user->role == 'admin') {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal'   => 'required|date',
            'jam'       => 'required',
        ]);

        $dokter   = Dokter::findOrFail($request->dokter_id);
        $userId   = $dokter->user_id;
        $dokterId = $dokter->id;
        $cabangId = $dokter->cabang_id;
    } else {
        $request->validate([
            'tanggal' => 'required|date',
            'jam'     => 'required',
        ]);

        $userId   = $user->id;
        $dokter   = Dokter::where('user_id', $userId)->firstOrFail();
        $dokterId = $dokter->id;
        $cabangId = $dokter->cabang_id;
    }

    JadwalPraktek::create([
        'user_id'   => $userId,
        'dokter_id' => $dokterId,
        'cabang_id' => $cabangId,
        'tanggal'   => $request->tanggal,
        'jam'       => $request->jam,
    ]);

    return redirect()->route('jadwalpraktek.index')
        ->with('success', 'Jadwal berhasil ditambahkan');
}


}
    