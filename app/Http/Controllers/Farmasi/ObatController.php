<?php

namespace App\Http\Controllers\Farmasi;

use App\Models\Obat;
use App\Models\farmasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::get();
        return view('Farmasi.Obat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Farmasi.Obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_obat' => 'required|max:255',
            'kode_obat' => 'required',
            'kandungan' => 'required',
            'bentuk_obat' => 'required',
            'satuan' => 'required',
            'pieces' => 'required',
            'tgl_produksi' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        $validated['harga'] = $validated['satuan'] * $validated['pieces'];

        Obat::create($validated);
        return redirect()->route('farmasi.obat.index');
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
        $obat = Obat::findOrFail($id);
        return view('Farmasi.Obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obat = Obat::findOrFail($id);
        $validated = $request->validate([
            'nama_obat' => 'required|max:255',
            'kode_obat' => 'required',
            'kandungan' => 'required',
            'bentuk_obat' => 'required',
            'satuan' => 'required',
            'pieces' => 'required',
            'tgl_produksi' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        $validated['harga'] = $validated['satuan'] * $validated['pieces'];

        $obat->update($validated);
        return redirect()->route('farmasi.obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('farmasi.obat.index');
    }
}
