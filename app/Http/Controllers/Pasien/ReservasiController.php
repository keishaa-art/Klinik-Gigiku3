<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Cabang;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\JadwalPraktek;


class ReservasiController extends Controller
{
    /**
     * 🔹 Menampilkan form reservasi (halaman buat pelanggan)
     */
    public function index()
    {
        $reservasis = Reservasi::where('user_id', auth()->id())
                               ->with(['dokter', 'cabang', 'pemeriksaan'])
                               ->latest()
                               ->get();

        return view('Reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        $cabangs = Cabang::all();
        $pemeriksaans = Pemeriksaan::all();

        return view('Reservasi.create', compact('cabangs', 'pemeriksaans'));
    }

    /**
     * 🔹 Ambil dokter berdasarkan cabang (AJAX)
     */
    public function getDokterByCabang($cabangId)
    {
        $dokters = User::where('role', 'dokter')
                        ->where('cabang_id', $cabangId)
                        ->get();

        return response()->json($dokters);
    }

    /**
     * 🔹 Ambil jadwal dokter berdasarkan cabang & dokter (AJAX)
     */
    public function getJadwalByDokter($dokterId, $cabangId)
    {
        $jadwals = JadwalPraktek::where('user_id', $dokterId)
                                ->where('cabang_id', $cabangId)
                                ->get();

        if ($jadwals->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Dokter tidak ada jadwal'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $jadwals
        ]);
    }

    /**
     * 🔹 Simpan data reservasi
     */
    public function store(Request $request)
    {
        $request->validate([
            'cabang_id' => 'required|exists:cabang,id',
            'dokter_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'pemeriksaan_id' => 'required|exists:pemeriksaan,id',
        ]);

        // ambil pemeriksaan buat hitung total
        $pemeriksaan = Pemeriksaan::find($request->pemeriksaan_id);

        $biayaReservasi = 50000; // contoh biaya tetap
        $total = $pemeriksaan->harga + $biayaReservasi;

        $reservasi = Reservasi::create([
            'user_id' => auth()->id(),
            'dokter_id' => $request->dokter_id,
            'cabang_id' => $request->cabang_id,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'pemeriksaan_id' => $request->pemeriksaan_id,
            'biaya_reservasi' => $biayaReservasi,
            'total' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('pasien.reservasi.show', $reservasi->id)
                         ->with('success', 'Reservasi berhasil dibuat!');
    }

    /**
     * 🔹 Menampilkan nota / detail reservasi
     */
    public function show($id)
    {
        $reservasi = Reservasi::with(['pasien', 'dokter', 'cabang', 'pemeriksaan'])
                              ->findOrFail($id);

        return view('Reservasi.nota', compact('reservasi'));
    }

    /**
     * (Opsional) 🔹 Menampilkan semua reservasi user login
     */
}
