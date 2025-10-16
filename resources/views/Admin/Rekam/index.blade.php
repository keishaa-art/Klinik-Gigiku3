@extends('layouts.admin-layout')

@section('konten')
<div class="p-6">

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4 border border-green-300 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-3 sm:mb-0">📋 Data Rekam Medis</h3>
        <a href="{{ route('admin.rekam.create') }}">
            <button class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-xl shadow">
                + Tambah Data
            </button>
        </a>
    </div>

    <!-- Card Wrapper -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <div class="bg-rose-300 text-white font-semibold px-4 py-3">
            Daftar Rekam Medis
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <th class="px-4 py-3 text-left rounded-tl-xl">No</th>
                        <th class="px-4 py-3 text-left">Pasien</th>
                        <th class="px-4 py-3 text-left">Dokter</th>
                        <th class="px-4 py-3 text-left">Pemeriksaan</th>
                        <th class="px-4 py-3 text-left">Diagnosa</th>
                        <th class="px-4 py-3 text-left">Tindakan</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-center rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($RekamMedis as $index => $rekam)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $rekam->pasien->name ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $rekam->dokter->name ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $rekam->pemeriksaan->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $rekam->diagnosa }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $rekam->tindakan }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ \Carbon\Carbon::parse($rekam->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.rekam.show', $rekam->id) }}" 
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm shadow">
                                        👁 Lihat
                                    </a>
                                    @if(Auth::user()->role === 'dokter')
                                        <a href="{{ route('admin.rekam.edit', $rekam->id) }}" 
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm shadow">
                                            ✏ Edit
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 italic py-4">
                                Belum ada data rekam medis.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
