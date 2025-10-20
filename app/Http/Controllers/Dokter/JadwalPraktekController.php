<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Dokter;
use App\Models\User;
use App\Models\Cabang;
use App\Models\JadwalPraktek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $jadwalpraktek = jadwalpraktek::get();
        return view('dokter.index', compact('jadwalpraktek'));
    }

    public function create()
    {
        $cabangs = Cabang::all();
        
        $user = auth()->user();

        if ($user->role == 'admin') {
            $dokters = Dokter::with('cabang')->get();
        } else {
            $dokters = null; // dokter ga pilih, otomatis ambil dirinya
        }

        return view('dokter.Jadwal.create', compact('dokters', 'user', 'cabangs'));
    }

    public function store(Request $request)
{

    $validated = $request->validate([
        'user_id'   => 'exists:users,id',
        'tanggal'   => 'required|date',
        'jam'       => 'required|string',
        'hari'       => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
        'cabang_id' => 'required|exists:cabangs,id',
    ]);
    $user = auth()->user();

    // Validasi input dari form

    // Ambil dokter berdasarkan user yang login
    // $dokter = Dokter::where('user_id', $user->id)->firstOrFail();

    // Simpan ke database
    JadwalPraktek::create([
        'user_id'   => Auth::user()->id,
        'tanggal'   => $validated['tanggal'],
        'jam'       => $validated['jam'],
        'hari'       => $validated['hari'],
        'cabang_id' => $validated['cabang_id'],
    ]);

    return redirect()->route('dokter.jadwalpraktek.index')
        ->with('success', 'Jadwal berhasil ditambahkan!');


}

public function edit($id)
{
    $jadwal = JadwalPraktek::with('cabang')->findOrFail($id);

    // Jika bukan admin, pastikan hanya bisa edit jadwal miliknya
    if (Auth::user()->role !== 'admin' && $jadwal->user_id !== Auth::id()) {
        return redirect()->route('dokter.jadwalpraktek.index')
            ->with('error', 'Anda tidak memiliki izin untuk mengedit jadwal ini.');
    }

    $cabangs = Cabang::all(); // hanya referensi, meski tidak bisa diubah

    return view('dokter.jadwal.edit', compact('jadwal', 'cabangs'));
}


public function update(Request $request, $id)
{
    $jadwal = JadwalPraktek::findOrFail($id);

    // Cegah user lain mengedit jadwal milik orang lain
    if (Auth::user()->role !== 'admin' && $jadwal->user_id !== Auth::id()) {
        return redirect()->route('dokter.jadwalpraktek.index')
            ->with('error', 'Anda tidak memiliki izin untuk memperbarui jadwal ini.');
    }

    // Validasi input
    $validated = $request->validate([
        'hari' => 'required|string',
        'tanggal' => 'required|date',
        'jam' => 'required|string',
        'cabang_id' => 'required|exists:cabangs,id',
    ], [
        'hari.required' => 'Hari wajib diisi.',
        'tanggal.required' => 'Tanggal wajib diisi.',
        'jam.required' => 'Jam wajib diisi.',
        'cabang_id.required' => 'Cabang wajib diisi.',
    ]);

    // Update data
    $jadwal->update($validated);

    return redirect()
        ->route('dokter.jadwalpraktek.index')
        ->with('success', '✅ Jadwal pemeriksaan berhasil diperbarui!');
}


public function destroy($id)
{
    $jadwal = JadwalPraktek::findOrFail($id);
    
    // Jika bukan admin, pastikan hanya bisa hapus jadwal miliknya sendiri
    if (Auth::user()->role !== 'admin' && $jadwal->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus jadwal ini.');
    }
    
    $jadwal->delete();
    
    return redirect()->route('dokter.jadwalpraktek.index')
    ->with('success', 'Jadwal berhasil dihapus.');
}

}