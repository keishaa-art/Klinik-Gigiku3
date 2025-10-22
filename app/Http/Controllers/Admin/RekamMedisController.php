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
        $role = strtolower($user->role);
        $RekamMedis = collect(); // biar gak undefined kalau ada error aneh

        switch ($role) {
            case 'admin':
                $RekamMedis = RekamMedis::with(['pemeriksaan', 'pasien', 'dokter'])
                    ->latest()
                    ->get();
                $view = 'Admin.Rekam.index';
                break;

            case 'dokter':
                $RekamMedis = RekamMedis::where('id_dokter', $user->id)
                    ->with(['pemeriksaan', 'pasien'])
                    ->latest()
                    ->get();
                $view = 'Dokter.Rekam.index';
                break;

            case 'pasien':
                $RekamMedis = RekamMedis::where('id_pasien', $user->id)
                    ->with(['pemeriksaan', 'dokter'])
                    ->latest()
                    ->get();
                $view = 'Pasien.Rekam.index';
                break;

            default:
                abort(403, 'Akses ditolak.');
        }

        return view($view, compact('RekamMedis'));
    }

    /**
     * Form tambah rekam medis (hanya dokter).
     */
    public function create()
    {
        $user = Auth::user();
        $role = strtolower($user->role);

        // Cuma dokter yang boleh tambah rekam medis
        if ($role !== 'dokter') {
            abort(403, 'Hanya dokter yang dapat menambah rekam medis.');
        }

        $pemeriksaans = Pemeriksaan::all();
        $pasiens = User::where('role', 'pasien')->get();

        // View dipisah berdasarkan folder role
        return view('Dokter.Rekam.create', compact('pemeriksaans', 'pasiens'));
    }

    /**
     * Simpan data rekam medis baru (hanya dokter).
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $role = strtolower($user->role);

        if ($role !== 'dokter') {
            abort(403, 'Hanya dokter yang dapat menambah rekam medis.');
        }

        $validated = $request->validate([
            'pasien_id' => 'required|exists:users,id',
            'pemeriksaan_id' => 'required|exists:pemeriksaans,id',
            'diagnosa' => 'required|string|max:255',
            'tindakan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        RekamMedis::create([
            'id_pasien' => $validated['pasien_id'],
            'id_dokter' => $user->id,
            'pemeriksaan_id' => $validated['pemeriksaan_id'],
            'diagnosa' => $validated['diagnosa'],
            'tindakan' => $validated['tindakan'],
            'tanggal' => $validated['tanggal'],
        ]);

        return redirect()->route('dokter.rekam.index')
            ->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    /**
     * Detail rekam medis berdasarkan ID dan hak akses.
     */
    public function show($id)
    {
        $user = Auth::user();
        $role = strtolower($user->role);

        $rekam = RekamMedis::with(['pemeriksaan', 'pasien', 'dokter'])->findOrFail($id);

        // Hak akses: admin, dokter pemilik data, atau pasien pemilik data
        if (
            $role === 'admin' ||
            ($role === 'dokter' && $rekam->id_dokter === $user->id) ||
            ($role === 'pasien' && $rekam->id_pasien === $user->id)
        ) {
            // View berdasarkan role
            $view = match ($role) {
                'admin' => 'Admin.Rekam.show',
                'dokter' => 'Dokter.Rekam.show',
                'pasien' => 'Pasien.Rekam.show',
                default => abort(403, 'Akses ditolak.'),
            };

            return view($view, compact('rekam'));
        }

        abort(403, 'Akses ditolak.');
    }
}
