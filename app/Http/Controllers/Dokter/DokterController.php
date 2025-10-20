<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\Cabang;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $dokter = Dokter::where('user_id', Auth::id())->with('cabang')->first();
        return view('dokter.dashboard', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.profile.create');
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    
    {
    // validasi (foto boleh required atau optional tergantung alur)
    $request->validate([
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        // jika kamu ingin menerima input lain dari form, validasikan juga:
        // 'name' => 'nullable|string|max:255',
        // 'nip' => 'nullable|string|max:50',
    ]);

    $userId = Auth::id();

    // ambil data dokter lama kalau ada
    $dokterLama = Dokter::where('user_id', $userId)->first();

    // jika ada file foto baru, simpan dan hapus foto lama
    $pathFoto = null;
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');

        // simpan file baru
        $pathFoto = $file->store('Dokter', 'public');

        // hapus file lama jika ada
        if ($dokterLama && $dokterLama->foto && Storage::disk('public')->exists($dokterLama->foto)) {
            Storage::disk('public')->delete($dokterLama->foto);
        }
    }

    // siapkan data yang akan diupdate / dibuat
    $data = [
        // gunakan nilai lama jika ada, atau default jika tidak
        'name' => $dokterLama->name ?? (Auth::user()->email ?? 'Dokter-' . $userId),
        'nip' => $dokterLama->nip ?? ('DOK' . str_pad($userId, 4, '0', STR_PAD_LEFT)), // contoh default
        'spesialis' => $dokterLama->spesialis ?? null,
        'tgl_lahir' => $dokterLama->tgl_lahir ?? null,
        'jenis_kelamin' => $dokterLama->jenis_kelamin ?? null,
        'no_telepon' => $dokterLama->no_telepon ?? null,
        'alamat' => $dokterLama->alamat ?? null,
        'cabang_id' => $dokterLama->cabang_id ?? null,
    ];

    // tambahkan foto hanya jika ada file baru (agar tidak menimpa dengan null)
    if ($pathFoto) {
        $data['foto'] = $pathFoto;
    }

    // update jika ada, buat baru jika belum ada
    $dokter = Dokter::updateOrCreate(
        ['user_id' => $userId],
        $data
    );

    return redirect()->route('dokter.profile.index')
        ->with('success', 'Profil dokter berhasil disimpan.');
        
    }
        
        /**
         * Display the specified resource.
        */
        public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail($id);

        // Pastikan hanya dokter yang login yang bisa edit dirinya sendiri
        if ($dokter->user_id !== Auth::id()) {
            abort(403, 'Tidak diizinkan mengedit profil orang lain.');
        }

        return view('dokter.profile.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokter = Dokter::findOrFail($id);

        if ($dokter->user_id !== Auth::id()) {
            abort(403, 'Tidak diizinkan mengedit profil orang lain.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'spesialis' => 'nullable|string|max:100',
            'tgl_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'no_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'cabang_id' => 'nullable|exists:cabangs,id',
        ]);

        $dokter->update($validated);

        return redirect()->route('dokter.dashboard', ['tab' => 'profil'])
                 ->with('success', 'Profil berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
