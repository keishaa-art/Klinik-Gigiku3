<?php

namespace App\Http\Controllers\Admin;

use App\Models\RekamMedis;
use App\Models\Pemeriksaan;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    /**
     * Tampilkan daftar rekam medis berdasarkan role pengguna.
     */
    public function index()
    {
        $user = Auth::user();

        // Filtering berdasarkan role
        if (strtolower($user->role) === 'admin') {
            $RekamMedis = RekamMedis::with(['pemeriksaan', 'pasien', 'dokter'])->latest()->get();
        } elseif (strtolower($user->role) === 'dokter') {
            $RekamMedis = RekamMedis::where('dokter_id', $user->id)
                ->with(['pemeriksaan', 'pasien'])
                ->latest()
                ->get();
        } elseif (strtolower($user->role) === 'pasien') {
            $RekamMedis = RekamMedis::where('pasien_id', $user->id)
                ->with(['pemeriksaan', 'dokter'])
                ->latest()
                ->get();
        } else {
            abort(403, 'Akses ditolak.');
        }

        // View tunggal dengan folder "Admin/Rekam"
        return view('Admin.Rekam.index', compact('RekamMedis'));
    }

    /**
     * Form tambah rekam medis (hanya dokter).
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->role !== 'dokter') {
            abort(403, 'Hanya dokter yang dapat menambah rekam medis.');
        }

        $pemeriksaans = Pemeriksaan::all();
        $pasiens = User::where('role', 'pasien')->get();

        return view('Admin.Rekam.create', compact('pemeriksaan', 'pasien'));
    }

    /**
     * Simpan data rekam medis baru (hanya dokter).
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'dokter') {
            abort(403, 'Hanya dokter yang dapat menambah rekam medis.');
        }

        $request->validate([
            'pasien_id' => 'required|exists:users,id',
            'pemeriksaan_id' => 'required|exists:pemeriksaans,id',
            'diagnosa' => 'required|string|max:255',
            'tindakan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        RekamMedis::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $user->id,
            'pemeriksaan_id' => $request->pemeriksaan_id,
            'diagnosa' => $request->diagnosa,
            'tindakan' => $request->tindakan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.rekam.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    /**
     * Detail rekam medis berdasarkan ID dan hak akses.
     */
    public function show($id)
    {
        $rekam = RekamMedis::with(['pemeriksaan', 'pasien', 'dokter'])->findOrFail($id);
        $user = Auth::user();

        // Hak akses
        if (
            $user->role === 'admin' ||
            ($user->role === 'dokter' && $rekam->dokter_id === $user->id) ||
            ($user->role === 'pasien' && $rekam->pasien_id === $user->id)
        ) {
            return view('Admin.Rekam.show', compact('RekamMedis'));
        }

        abort(403, 'Akses ditolak.');
    }
}
