@extends('layouts.admin-layout')

@section('konten')
<div class="p-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-3 sm:mb-0 flex items-center gap-2">
            <i class="bi bi-geo-alt text-rose-500"></i>
            Data Cabang Klinik Gigiku
        </h3>
        <a href="{{ route('admin.cabang.create') }}">
            <button class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-xl shadow flex items-center gap-2">
                <i class="bi bi-plus-circle"></i>
                Tambah Cabang
            </button>
        </a>
    </div>

    <!-- Card Wrapper -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <div class="bg-rose-300 text-white font-semibold px-4 py-3 flex items-center gap-2">
            <i class="bi bi-list-task"></i>
            Daftar Cabang
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <th class="px-4 py-3 text-left rounded-tl-xl">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Alamat</th>
                        <th class="px-4 py-3 text-center rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($cabang as $no => $c)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $no + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $c->nama }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $c->alamat }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.cabang.edit', $c->id) }}" 
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm shadow flex items-center gap-1">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.cabang.destroy', $c->id)}}" 
                                          method="post" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm shadow flex items-center gap-1">
                                            <i class="bi bi-trash"></i>
                                            Hapus
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
