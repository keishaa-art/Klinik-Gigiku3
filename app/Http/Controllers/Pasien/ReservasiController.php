<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Cabang;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\JadwalPraktek;
use Illuminate\Support\Carbon;

class ReservasiController extends Controller
{
    /**
     * 🔹 Menampilkan riwayat reservasi
     */
    public function index()
    {
        $reservasis = Reservasi::where('user_id', auth()->id())
                               ->with(['dokter', 'cabang', 'pemeriksaan'])
                               ->latest()
                               ->get();

        return view('Reservasi.index', compact('reservasis'));
    }

    /**
     * 🔹 Redirect ke step pertama
     */
    public function create()
    {
        return redirect()->route('pasien.reservasi.cabang');
    }

    /**
     * 🔹 Step 1: Pilih Cabang
     */
    public function pilihCabang()
    {
        $cabangs = Cabang::all();
        
        // Debug: cek apakah data cabang ada
        if ($cabangs->isEmpty()) {
            \Log::warning('Data cabang kosong');
        }
        
        return view('Reservasi.cabang', compact('cabangs'));
    }

    /**
     * 🔹 Step 2: Pilih Dokter
     */
    public function pilihDokter(Request $request)
    {
        $request->validate([
            'cabang_id' => 'required|exists:cabangs,id'
        ]);

        $cabang = Cabang::findOrFail($request->cabang_id);
        $dokters = User::where('role', 'dokter')
                       ->where('cabang_id', $request->cabang_id)
                       ->get();

        // Simpan di session
        session([
            'reservasi.cabang_id' => $request->cabang_id,
            'reservasi.cabang_nama' => $cabang->nama,
            'reservasi.cabang_alamat' => $cabang->alamat
        ]);

        return view('Reservasi.dokter', compact('dokters', 'cabang'));
    }

    /**
     * 🔹 Step 3: Pilih Jadwal
     */
    public function pilihJadwal(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id'
        ]);

        $dokter = User::findOrFail($request->dokter_id);
        $cabangId = session('reservasi.cabang_id');
        
        // Cek jadwal dokter
        $jadwalDokter = JadwalPraktek::where('user_id', $request->dokter_id)
                                    ->where('cabang_id', $cabangId)
                                    ->get();

        if ($jadwalDokter->isEmpty()) {
            return redirect()->back()
                ->with('error', 'Dokter tidak memiliki jadwal praktek di cabang ini.')
                ->withInput();
        }

        // Simpan di session
        session([
            'reservasi.dokter_id' => $request->dokter_id,
            'reservasi.dokter_nama' => $dokter->name,
            'reservasi.dokter_spesialis' => $dokter->spesialis
        ]);

        return view('Reservasi.jadwal', compact('jadwalDokter', 'dokter'));
    }

    /**
     * 🔹 Step 4: Showcase dengan popup pemeriksaan
     */
    public function pilihPemeriksaan(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|after:today',
            'jam' => 'required'
        ]);

        // Validasi jadwal dokter
        $tanggal = Carbon::parse($request->tanggal);
        $hari = $this->convertToHariIndonesia($tanggal->format('l'));
        
        $jadwal = JadwalPraktek::where('user_id', session('reservasi.dokter_id'))
                              ->where('cabang_id', session('reservasi.cabang_id'))
                              ->where('hari', $hari)
                              ->first();

        if (!$jadwal) {
            return redirect()->back()
                ->with('error', 'Dokter tidak praktek pada hari yang dipilih.')
                ->withInput();
        }

        // Cek ketersediaan jam
        $existing = Reservasi::where('dokter_id', session('reservasi.dokter_id'))
                            ->where('tanggal', $request->tanggal)
                            ->where('jam', $request->jam)
                            ->whereIn('status', ['pending', 'confirmed'])
                            ->exists();

        if ($existing) {
            return redirect()->back()
                ->with('error', 'Jam tersebut sudah dipesan. Silakan pilih jam lain.')
                ->withInput();
        }

        // Simpan jadwal di session
        session([
            'reservasi.tanggal' => $request->tanggal,
            'reservasi.jam' => $request->jam
        ]);

        // PERBAIKAN: Ambil semua data pemeriksaan dengan field yang benar
        $pemeriksaans = Pemeriksaan::all();

        return view('Reservasi.pemeriksaan', compact('pemeriksaans'));
    }

    /**
     * 🔹 Simpan Reservasi Final
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemeriksaan_id' => 'required|exists:pemeriksaans,id',
            'keluhan' => 'nullable|string|max:500'
        ]);

        // Ambil data dari session
        $reservasiData = session('reservasi');
        
        if (!$reservasiData) {
            return redirect()->route('pasien.reservasi.cabang')
                ->with('error', 'Sesi reservasi telah kadaluarsa. Silakan mulai kembali.');
        }

        // Hitung biaya
        $pemeriksaan = Pemeriksaan::findOrFail($request->pemeriksaan_id);
        $biayaReservasi = 50000;
        $total = $pemeriksaan->harga + $biayaReservasi;

        // Buat reservasi
        $reservasi = Reservasi::create([
            'user_id' => auth()->id(),
            'dokter_id' => $reservasiData['dokter_id'],
            'cabang_id' => $reservasiData['cabang_id'],
            'pemeriksaan_id' => $request->pemeriksaan_id,
            'tanggal' => $reservasiData['tanggal'],
            'jam' => $reservasiData['jam'],
            'biaya_reservasi' => $biayaReservasi,
            'total' => $total,
            'status' => 'pending',
            'keluhan' => $request->keluhan
        ]);

        // Hapus session
        session()->forget('reservasi');

        return redirect()->route('pasien.reservasi.show', $reservasi->id)
                         ->with('success', 'Reservasi berhasil dibuat!');
    }

    /**
     * 🔹 Menampilkan detail reservasi
     */
    public function show($id)
    {
        $reservasi = Reservasi::with(['dokter', 'cabang', 'pemeriksaan'])
                              ->where('user_id', auth()->id())
                              ->findOrFail($id);

        return view('Reservasi.nota', compact('reservasi'));
    }

    /**
     * 🔹 Edit (tidak digunakan)
     */
    public function edit($id)
    {
        return redirect()->route('pasien.reservasi.index')
                         ->with('info', 'Edit reservasi tidak tersedia.');
    }

    /**
     * 🔹 Update (tidak digunakan)
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('pasien.reservasi.index')
                         ->with('info', 'Update reservasi tidak tersedia.');
    }

    /**
     * 🔹 Hapus reservasi
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::where('user_id', auth()->id())
                             ->where('status', 'pending')
                             ->findOrFail($id);

        $reservasi->delete();

        return redirect()->route('pasien.reservasi.index')
                         ->with('success', 'Reservasi berhasil dibatalkan.');
    }

    /**
     * 🔹 AJAX: Get dokter berdasarkan cabang
     */
    public function getDokterByCabang($cabangId)
    {
        $dokters = User::where('role', 'dokter')
                        ->where('cabang_id', $cabangId)
                        ->get(['id', 'name', 'spesialis']);

        return response()->json($dokters);
    }

    /**
     * 🔹 AJAX: Get jadwal dokter
     */
    public function getJadwalByDokter($dokterId, $cabangId)
    {
        $jadwals = JadwalPraktek::where('user_id', $dokterId)
                                ->where('cabang_id', $cabangId)
                                ->get();

        if ($jadwals->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Dokter tidak memiliki jadwal praktek di cabang ini'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $jadwals
        ]);
    }

    /**
     * 🔹 AJAX: Check availability time
     */
    public function checkAvailableTime(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'cabang_id' => 'required|exists:cabangs,id',
            'tanggal' => 'required|date',
            'jam' => 'required'
        ]);

        // Konversi hari
        $tanggal = Carbon::parse($request->tanggal);
        $hari = $this->convertToHariIndonesia($tanggal->format('l'));

        // Cek jadwal dokter
        $jadwal = JadwalPraktek::where('user_id', $request->dokter_id)
                              ->where('cabang_id', $request->cabang_id)
                              ->where('hari', $hari)
                              ->first();

        if (!$jadwal) {
            return response()->json([
                'available' => false,
                'message' => 'Dokter tidak praktek pada hari yang dipilih'
            ]);
        }

        // Cek jam
        if ($request->jam < $jadwal->jam_mulai || $request->jam > $jadwal->jam_selesai) {
            return response()->json([
                'available' => false,
                'message' => 'Jam tidak sesuai dengan jadwal praktek dokter'
            ]);
        }

        // Cek reservasi existing
        $existing = Reservasi::where('dokter_id', $request->dokter_id)
                            ->where('tanggal', $request->tanggal)
                            ->where('jam', $request->jam)
                            ->whereIn('status', ['pending', 'confirmed'])
                            ->exists();

        if ($existing) {
            return response()->json([
                'available' => false,
                'message' => 'Jam sudah dipesan, silakan pilih jam lain'
            ]);
        }

        return response()->json([
            'available' => true,
            'message' => 'Jam tersedia'
        ]);
    }

    /**
     * 🔹 Helper: Convert hari Inggris ke Indonesia
     */
    private function convertToHariIndonesia($hariInggris)
    {
        $hariMap = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        return $hariMap[$hariInggris] ?? $hariInggris;
    }
}