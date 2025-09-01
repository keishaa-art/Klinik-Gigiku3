<?php

namespace App\Http\Controllers\Admin;

use App\Models\pemeriksaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaan = Pemeriksaan::get();
        return view('Admin.Pemeriksaan.index', compact('pemeriksaan')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Pemeriksaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|string',
        'detail' => 'required|string',
        'harga' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('gambar')->store('pemeriksaan', 'public');

        $validated['gambar'] = $path;

        Pemeriksaan::create($validated);

        return redirect()->route('admin.pemeriksaan.index');
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
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        return view('Admin.Pemeriksaan.edit', compact('pemeriksaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'nama' => 'required|string',
        'detail' => 'required|string',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pemeriksaan = Pemeriksaan::findOrFail($id); // <-- Tambahkan ini

    // Cek apakah ada file gambar baru
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('pemeriksaan', 'public');
        $validated['gambar'] = $path;
    }

    $pemeriksaan->update($validated);

    return redirect()->route('pemeriksaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemeriksaan $pemeriksaan)
    {
        $pemeriksaan->delete();
        return redirect()->route('pemeriksaan.index');
    }   
}
