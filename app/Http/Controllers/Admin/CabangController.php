<?php

namespace App\Http\Controllers\Admin;

use App\Models\cabang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabang = Cabang::get();
        return view('admin.cabang.index', compact('cabang')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|string',
        'alamat' => 'required|string',
        ]);

        Cabang::create($validated);

        return redirect()->route('admin.cabang.index');
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
        $cabang = Cabang::findOrFail($id);
        return view('admin.cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'nama' => 'required|string',
        'alamat' => 'required|string',
    ]);

        $cabang = Cabang::findOrFail($id);
        $cabang->update($validated);

        return redirect()->route('admin.cabang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cabang $cabang)
    {
        $cabang->delete();
        return redirect()->route('admin.cabang.index');
    }
}
