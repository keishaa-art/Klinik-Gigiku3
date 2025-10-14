@extends('layouts.admin-layout')

@section('konten')
    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <h1 class="text-3xl font-bold mb-6">Selamat Datang, Admin!</h1>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-gray-500">Total Pasien</p>
                <h2 class="text-2xl font-bold">{{ $totalPasien }}</h2>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-gray-500">Total Dokter</p>
                <h2 class="text-2xl font-bold">{{ $totalDokter }}</h2>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-gray-500">Total Pengunjung Hari Ini</p>
                <h2 class="text-2xl font-bold">{{ $totalPengunjung }}</h2>
            </div>
        </div>

        <!-- Data Account -->
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-xl font-bold mb-4">Data Account (Dokter & Pasien)</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">Nama</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accounts as $index => $acc)
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                                <td>
                                    @if ($acc->role == 'Dokter')
                                        {{ $acc->dokter->name ?? '-' }}
                                    @elseif($acc->role == 'Pasien')
                                        {{ $acc->pasien->name ?? '-' }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">{{ $acc->email }}</td>
                                <td class="py-2 px-4 border-b">{{ $acc->role }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-3">Belum ada akun Dokter atau Pasien</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
