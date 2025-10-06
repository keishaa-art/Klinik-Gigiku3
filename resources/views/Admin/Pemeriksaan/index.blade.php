@extends('layouts.admin-layout')

@section('konten')
<div class="p-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-3 sm:mb-0">📋 Data Harga Pemeriksaan</h3>
        <a href="{{ route('admin.pemeriksaan.create') }}">
            <button class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-xl shadow">
                + Tambah Data
            </button>
        </a>
    </div>

    <!-- Card Wrapper -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <div class="bg-rose-300 text-white font-semibold px-4 py-3">
            Daftar Pemeriksaan
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <th class="px-4 py-3 text-left rounded-tl-xl">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Detail Pemeriksaan</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3 text-center">Gambar</th>
                        <th class="px-4 py-3 text-center rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pemeriksaan as $no => $pemeriksaan)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $no + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $pemeriksaan->nama }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $pemeriksaan->detail }}</td>
                            <td class="px-4 py-3 font-semibold text-green-600">
                                Rp {{ number_format($pemeriksaan->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($pemeriksaan->gambar)
                                    <img src="{{ asset('storage/' . $pemeriksaan->gambar) }}"
                                         alt="Foto Pemeriksaan"
                                         class="w-20 h-20 object-cover rounded-lg shadow-sm mx-auto">
                                @else
                                    <span class="text-sm text-gray-500 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.pemeriksaan.edit', $pemeriksaan->id) }}" 
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm shadow">
                                        ✏ Edit
                                    </a>
                                    <form action="{{ route('admin.pemeriksaan.destroy', $pemeriksaan->id)}}" 
                                          method="post" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm shadow">
                                            🗑 Hapus
                                        </button>
                                    </form>  
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection