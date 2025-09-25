<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Cabang;
use App\Models\dokter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DataDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = dokter::with('user', 'cabang')->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'Dokter')
            ->whereDoesntHave('dokter')
            ->get();
        $cabangs = Cabang::all();
        return view('admin.dokter.create', compact('users', 'cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'nip' => 'required',
            'spesialis' => 'nullable|string',
            'tgl_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
            'cabang_id' => 'required|exists:cabangs,id',
        ]);

        Dokter::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'nip' => $request->nip,
            'spesialis' => $request->spesialis,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'cabang_id' => $request->cabang_id,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter beserta user & cabang berhasil dibuat.');
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
        $dokter = Dokter::with('user', 'cabang')->findOrFail($id);
        $users = User::where('role', 'Dokter')->get();
        $cabangs = Cabang::all();
        return view('admin.dokter.edit', compact('dokter', 'users', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        $dokter->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'spesialis' => $request->spesialis,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'cabang_id' => $request->cabang_id,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
