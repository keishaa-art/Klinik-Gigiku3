@extends('layouts.dokter-layout')

@section('konten')

@if ($errors->any())
<div class="bg-red-100 text-red-600 p-3 rounded mb-4">
  <ul>
    @foreach ($errors->all() as $error)
      <li>⚠️ {{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<h1 class="text-3xl font-bold text-T2 mb-6">Edit Jadwal Pemeriksaan</h1>

<div class="bg-white border-2 border-accent rounded-lg p-6 shadow">
  <form id="editForm" action="{{ route('dokter.jadwalpraktek.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')

    <!-- Hari -->
    <div>
      <label class="block font-semibold text-T2 mb-2">Hari</label>
      <select name="hari" id="hari" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
        <option value="">-- Pilih Hari --</option>
        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
          <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
        @endforeach
      </select>
    </div>

    <!-- Tanggal -->
    <div>
      <label class="block font-semibold text-T2 mb-2">Tanggal</label>
      <input 
        type="date" 
        name="tanggal" 
        value="{{ $jadwal->tanggal }}" 
        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
    </div>

    <!-- Jam -->
    <div>
      <label class="block font-semibold text-T2 mb-2">Jam Praktek</label>
      <div class="flex gap-2">
        @php
          $jamParts = explode(' - ', $jadwal->jam);
          $jamMulai = $jamParts[0] ?? '';
          $jamSelesai = $jamParts[1] ?? '';
        @endphp

        <input 
          type="time" 
          id="jam_mulai" 
          value="{{ $jamMulai }}" 
          class="w-1/2 border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">

        <input 
          type="time" 
          id="jam_selesai" 
          value="{{ $jamSelesai }}" 
          class="w-1/2 border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-T1 focus:outline-none">
      </div>
      <input type="hidden" name="jam" id="jam" value="{{ $jadwal->jam }}">
    </div>

    <!-- Cabang -->
    <div>
      <label class="block font-semibold text-T2 mb-2">Cabang Kota</label>
      <select 
        name="cabang_id" 
        class="w-full border border-gray-300 rounded-xl px-4 py-2 bg-gray-100 text-gray-600 cursor-not-allowed"
        disabled>
        <option value="{{ $jadwal->cabang_id }}" selected>
          {{ $jadwal->cabang->nama ?? 'Cabang Tidak Ditemukan' }}
        </option>
      </select>
      <input type="hidden" name="cabang_id" value="{{ $jadwal->cabang_id }}">
    </div>

    <!-- Tombol -->
    <div class="flex justify-end gap-3">
      <a href="{{ route('dokter.jadwalpraktek.index') }}" 
         class="px-5 py-2 rounded-xl border border-gray-300 text-gray-600 font-semibold hover:bg-gray-100 transition">
        Batal
      </a>
      <button type="button" 
              id="confirmBtn"
              class="px-5 py-2 rounded-xl bg-T1 text-white font-semibold shadow hover:bg-opacity-90 transition">
        Perbarui
      </button>
    </div>
  </form>
</div>

<!-- Konfirmasi Modal -->
<div id="confirmModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white rounded-2xl shadow-lg p-6 w-80 text-center border-2 border-accent">
    <h2 class="text-lg font-semibold text-T2 mb-4">Yakin ingin mengubah jadwal ini?</h2>
    <div class="flex justify-center gap-4">
      <button id="cancelConfirm" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">Batal</button>
      <button id="submitConfirm" class="px-4 py-2 bg-T1 text-white rounded-lg hover:bg-T2 transition">Ya, Ubah</button>
    </div>
  </div>
</div>

<script>
  // Update jam gabungan otomatis
  const jamMulai = document.getElementById('jam_mulai');
  const jamSelesai = document.getElementById('jam_selesai');
  const jamInput = document.getElementById('jam');
  const updateJam = () => {
    if (jamMulai.value && jamSelesai.value) {
      jamInput.value = `${jamMulai.value} - ${jamSelesai.value}`;
    }
  };
  jamMulai.addEventListener('change', updateJam);
  jamSelesai.addEventListener('change', updateJam);

  // Konfirmasi sebelum submit
  const confirmBtn = document.getElementById('confirmBtn');
  const confirmModal = document.getElementById('confirmModal');
  const cancelConfirm = document.getElementById('cancelConfirm');
  const submitConfirm = document.getElementById('submitConfirm');
  const editForm = document.getElementById('editForm');

  confirmBtn.addEventListener('click', () => confirmModal.classList.remove('hidden'));
  cancelConfirm.addEventListener('click', () => confirmModal.classList.add('hidden'));
  submitConfirm.addEventListener('click', () => editForm.submit());
</script>

@endsection
