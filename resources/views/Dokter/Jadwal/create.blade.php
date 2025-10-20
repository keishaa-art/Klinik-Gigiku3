@extends('layouts.dokter-layout')

@section('konten')

@if ($errors->any())
    <div class="bg-red-100 text-red-600 p-3 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <h1 class="text-3xl font-bold text-T2 mb-6">Tambah Jadwal Pemeriksaan</h1>
      
      <div class="bg-white border-2 border-accent rounded-lg p-6 shadow">
        <form action="{{ route('dokter.jadwalpraktek.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
          @csrf
          
          <!-- hari -->
          <label class="block font-semibold text-T2 mb-2">Hari</label>
          <select name="hari" id="hari" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
            <option value=""> -- Pilih Hari -- </option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
          </select>
          
          <!-- Tanggal -->
          <div>
            <label class="block font-semibold text-T2 mb-2">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
          </div>
          
          <!-- Jam -->
          <div>
            <label class="block font-semibold text-T2 mb-2">Jam Praktek</label>
            <div class="flex gap-2">
              <input type="time" id="jam_mulai" class="w-1/2 border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
              <input type="time" id="jam_selesai" class="w-1/2 border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
            </div>
            <!-- input tersembunyi untuk dikirim -->
            <input type="hidden" name="jam" id="jam">
          </div>
          
          <!-- Cabang -->
          <div>
            <label class="block font-semibold text-T2 mb-2">Cabang Kota</label>
            <select name="cabang_id" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
              <option value="">-- Pilih Cabang --</option>
              @foreach ($cabangs as $cabang)
              <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
              @endforeach
            </select>
          </div>
          <div>
            
            <!-- Tombol -->
            <div class="flex justify-end gap-3">
              <a href="{{ route('dokter.jadwalpraktek.index') }}" class="px-5 py-2 rounded-xl border border-gray-300 text-gray-600 font-semibold hover:bg-gray-100 transition">
                Batal
              </a>
              <button type="submit" class="px-5 py-2 rounded-xl bg-T1 text-white font-semibold shadow hover:bg-opacity-90 transition">
                Simpan
              </button>
            </div>
          </div>
        </form>
      </div>
 @endsection
 
 <script>
document.addEventListener('DOMContentLoaded', function () {
  const jamMulai = document.getElementById('jam_mulai');
  const jamSelesai = document.getElementById('jam_selesai');
  const jamHidden = document.getElementById('jam');
  const form = document.querySelector('form');

  // Update nilai jam setiap kali input berubah
  function updateJam() {
    if (jamMulai.value && jamSelesai.value) {
      jamHidden.value = `${jamMulai.value} - ${jamSelesai.value}`;
    }
  }

  jamMulai.addEventListener('input', updateJam);
  jamSelesai.addEventListener('input', updateJam);

  // Pastikan sebelum submit, nilai jam sudah diperbarui
  form.addEventListener('submit', function (e) {
    updateJam();
    if (!jamHidden.value) {
      e.preventDefault();
      alert("Mohon isi jam mulai dan jam selesai terlebih dahulu!");
    }
  });
});
</script>
