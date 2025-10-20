@extends('layouts.farnasi-layout')

@section('konten')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="p-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-3 sm:mb-0">📋 Data Obat</h3>
        <a href="{{ route('farmasi.obat.create') }}">
            <button class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-xl shadow">
                + Tambah Data
            </button>
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <div class="bg-rose-300 text-white font-semibold px-4 py-3">
            Data Obat-Obatan
        </div>

    <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <th class="px-4 py-3 text-left rounded-tl-xl">No</th>
                        <th class="px-4 py-3 text-left">Nama Obat</th>
                        <th class="px-4 py-3 text-left">Kode Obat</th>
                        <th class="px-4 py-3 text-left">Kandungan</th>
                        <th class="px-4 py-3 text-left">Bentuk Obat</th>
                        <th class="px-4 py-3 text-left">Satuan</th>
                        <th class="px-4 py-3 text-left">Pieces</th>
                        <th class="px-4 py-3 text-left">Tgl Produksi</th>
                        <th class="px-4 py-3 text-left">Tgl Kadaluarsa</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3 text-center rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                 @foreach ($obat as $no => $obat)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $no + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $obat->nama_obat }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->kode_obat }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->kandungan }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->bentuk_obat }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->satuan }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->pieces }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->tgl_produksi }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $obat->tgl_kadaluarsa }}</td>
                            <td class="px-4 py-3 font-semibold text-green-600">
                                Rp {{ number_format($obat->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('farmasi.obat.edit', $obat->id) }}" 
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm shadow">
                                        ✏ Edit
                                    </a>
                                    <form action="{{ route('farmasi.obat.destroy', $obat->id) }}" 
                                          method="post" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data obat ini?')">
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
   </body>

</html>

@endsection
