@extends('layouts.dokter-layout')

@section('konten')  
  <!-- Judul -->
  <h1 class="text-3xl font-bold text-T2 mb-6">Jadwal Pemeriksaan</h1>
  
  <div class="bg-white border-2 border-accent rounded-lg p-6 mb-6 shadow">
    {{-- Alert Pesan --}}
    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
      <strong>Berhasil!</strong> {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
      <strong>Gagal!</strong> {{ session('error') }}
    </div>
    @endif

    <!-- Tombol Buat Jadwal -->
    <div class="py-4 flex justify-start">
      <a href="{{ route('dokter.jadwalpraktek.create') }}"
        class="group relative inline-flex items-center gap-2 bg-T1 text-white font-semibold px-5 py-3 rounded-2xl shadow-lg
               transform transition-all duration-300 ease-out hover:-translate-y-1 hover:scale-105 hover:shadow-xl">
        <i class='bx  bx-plus'  ></i>        
        <span class="group-hover:translate-x-1 transition-transform duration-300">Buat Jadwal</span>
      </a>
    </div>

    <!-- Tabel Jadwal -->
    <table class="w-full text-left border">
      <thead>
        <tr class="bg-gradient-to-r from-soft to-accent text-T2">
          <th class="p-2">No</th>
          <th class="p-2">Hari</th>
          <th class="p-2">Tanggal</th>
          <th class="p-2">Jam Operasional</th>
          <th class="p-2">Cabang</th>
          <th class="p-2 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jadwalpraktek as $no => $jp)
        <tr class="text-T2 border-t hover:bg-gray-50 transition">
          <td class="p-2">{{ $no + 1 }}</td>
          <td class="p-2">{{ $jp->hari }}</td>
          <td class="p-2">{{ $jp->tanggal }}</td>
          <td class="p-2">{{ $jp->jam }}</td>
          <td class="p-2">{{ $jp->cabang->nama ?? '-' }}</td>
          <td class="p-2 flex gap-2 justify-center">
            <!-- ✏️ Tombol Edit -->
            <a href="{{ route('dokter.jadwalpraktek.edit', $jp->id) }}"
              class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition font-semibold">
              <i class='bx  bx-pencil'  ></i> 
            </a>

            <!-- 🗑️ Tombol Hapus -->
            <button onclick="openModal('{{ route('dokter.jadwalpraktek.destroy', $jp->id) }}')" 
              class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition font-semibold">
              <i class='bx  bx-trash'  ></i> 
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- ✅ Modal Konfirmasi -->
  <div id="confirmModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-lg p-6 w-80 text-center border-2 border-accent">
      <h2 class="text-lg font-semibold text-T2 mb-4">Yakin ingin menghapus jadwal ini?</h2>
      <div class="flex justify-center gap-4">
        <button id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">Batal</button>
        <form id="deleteForm" method="POST" action="">
          @csrf
          @method('DELETE')
          <button type="submit" class="px-4 py-2 bg-T1 text-white rounded-lg hover:bg-T2 transition">Hapus</button>
        </form>
      </div>
    </div>
  </div>
@endsection
