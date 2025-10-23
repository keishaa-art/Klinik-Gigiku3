@extends('layouts.dokter-layout')

@section('konten')
<body class="bg-[#FFF9F8] text-T2 min-h-screen flex flex-col">

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 
    bg-gradient-to-b from-soft to-accent shadow-xl text-T2
    transform -translate-x-full md:translate-x-0 
    transition-transform duration-300 z-50">

    <div class="flex flex-col h-full">
      <div class="flex items-center justify-center py-6 border-b border-white/30">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12">
        <span class="font-semibold text-3xl font-['playfair'] text-[#C04C4C]">Gigiku</span>
      </div>

      <nav class="flex-1 px-4 py-6 space-y-3">
        <a href="/dokter" class="flex items-center gap-3 p-3 rounded-xl font-semibold hover:bg-white/20 transition">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 17v-6h6v6H9zM3 7h18M5 21h14a2 2 0 
              002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 
              2 0 002 2z" />
          </svg>
          Dashboard Dokter
        </a>

        <a href="{{ route('dokter.jadwalpraktek.index')}}" class="flex items-center gap-3 p-3 rounded-xl font-semibold hover:bg-white/20 transition">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 
              2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          Jadwal Pemeriksaan
        </a>

        <a href="/" class="flex items-center gap-3 p-3 rounded-xl font-semibold hover:bg-white/20 transition">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h6V14h4v6h6V10" />
          </svg>
          Home
        </a>
      </nav>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="px-4 py-4 border-t border-white/30">
          <button class="flex items-center justify-center gap-2 bg-T1 text-white font-semibold px-4 py-2 rounded-xl shadow hover:bg-opacity-90 transition w-full">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
            </svg>
            Logout
          </button>
        </div>
      </form>
    </div>
  </aside>

  <!-- Tombol Toggle (Mobile) -->
  <button id="menuToggle" class="md:hidden fixed top-4 left-4 bg-T1 text-white p-2 rounded-lg z-50">
    ☰
  </button>

  <!-- Konten Utama -->
  <main class="flex-1 md:ml-64 p-6 pt-16 pb-20 animate-[fadeInDown_0.6s_ease]">
    <h1 class="text-4xl font-bold text-T1 mb-8 text-center drop-shadow-sm">
      ✏️ Edit Profil Dokter
    </h1>

    @if (session('success'))
      <div class="mb-5 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg text-center">
        {{ session('success') }}
      </div>
    @endif

    <div class="form-card rounded-2xl p-8 shadow-xl">
      <form action="{{ route('dokter.profile.update', $dokter->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block mb-1 font-semibold text-T2">Nama</label>
            <input type="text" name="name" value="{{ old('name', $dokter->name) }}"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none" required>
          </div>

          <div>
            <label class="block mb-1 font-semibold text-T2">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $dokter->nip) }}"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none">
          </div>

          <div>
            <label class="block mb-1 font-semibold text-T2">Spesialis</label>
            <input type="text" name="spesialis" value="{{ old('spesialis', $dokter->spesialis) }}"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none">
          </div>

          <div>
            <label class="block mb-1 font-semibold text-T2">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $dokter->tgl_lahir) }}"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none">
          </div>

          <div>
            <label class="block mb-1 font-semibold text-T2">Jenis Kelamin</label>
            <select name="jenis_kelamin"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none">
              <option value="">Pilih</option>
              <option value="Laki-laki" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>

          <div>
            <label class="block mb-1 font-semibold text-T2">Nomor Telepon</label>
            <input type="text" name="no_telepon" value="{{ old('no_telepon', $dokter->no_telepon) }}"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none">
          </div>

          <div class="md:col-span-2">
            <label class="block mb-1 font-semibold text-T2">Alamat</label>
            <textarea name="alamat"
              class="w-full border border-gray-300 px-4 py-2 rounded-xl focus:ring-2 focus:ring-T1 focus:outline-none"
              rows="3">{{ old('alamat', $dokter->alamat) }}</textarea>
          </div>
        </div>

        <!-- Tombol -->
        <div class="mt-8 flex justify-end gap-3">
          <a href="{{ route('dokter.dashboard') }}"
            class="px-5 py-2 rounded-xl border border-gray-300 text-gray-600 font-semibold hover:bg-gray-100 transition">
            Batal
          </a>
          <button type="submit" class="btn-primary px-6 py-2 rounded-xl text-white font-semibold">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
@endsection