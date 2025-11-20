// index dokter

@extends('layouts.admin-layout')

@section('konten')

<!-- Header -->


<!-- Container -->
<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- Table Card -->
    <div class="bg-[#F0BAAF] shadow-lg rounded-xl p-6">

        <h3 class="text-xl font-semibold text-[#C04C4C] mb-4">Daftar Dokter</h3>

        @if($dokters->count() > 0)

        <div class="overflow-x-auto">
            <table class="w-full bg-white rounded-xl overflow-hidden">
                <thead class="bg-[#C04C4C] text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">NIP</th>
                        <th class="py-3 px-4 text-left">Spesialis</th>
                        <th class="py-3 px-4 text-left">Cabang</th>
                        <th class="py-3 px-4 text-left">Jenis Kelamin</th>
                        <th class="py-3 px-4 text-left">No Telepon</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dokters as $index => $dokter)
                    <tr class="border-b hover:bg-[#FFE6E1] transition">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 text-[#C04C4C] font-medium">{{ $dokter->name }}</td>
                        <td class="py-3 px-4">{{ $dokter->nip }}</td>
                        <td class="py-3 px-4">{{ $dokter->spesialis ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $dokter->cabang->nama ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $dokter->jenis_kelamin ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $dokter->no_telepon ?? '-' }}</td>

                        <td class="py-3 px-4 text-center">

                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.dokter.edit', $dokter->id) }}"
                               class="px-3 py-1 bg-[#C04C4C] text-white rounded-md text-sm hover:bg-[#a93d3d]">
                                Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.dokter.destroy', $dokter->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin hapus?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded-md text-sm hover:bg-red-600 ml-1">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <div class="text-center py-6">
            <p class="text-[#C04C4C] font-semibold">Belum ada data dokter.</p>
        </div>
        @endif
    </div>
</div>

@endsection
