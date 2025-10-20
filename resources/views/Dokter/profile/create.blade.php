@extends('layouts.dokter-layout')

@section('konten')
<body class="font-istok bg-gradient-to-b from-soft to-accent flex flex-col min-h-screen text-T2">

  <!-- Container utama -->
  <div class="flex flex-col items-center justify-center flex-grow p-6">
    <div class="bg-white border-2 border-accent rounded-2xl p-8 shadow-lg w-full max-w-md text-center">

      <h1 class="text-2xl font-bold mb-6 text-T2">Tambah Foto Profil Dokter</h1>

      @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg">
          {{ session('error') }}
        </div>
      @endif

      <!-- Form upload foto -->
      <form action="{{ route('dokter.profile.store', $dokter->id ?? '') }}"  
            method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Preview foto -->
        <div class="relative flex flex-col items-center">
          <img 
            id="previewImage"
            src="{{ asset('img/default-profile.png') }}"
            alt="Preview Foto"
            class="w-40 h-40 rounded-full border-4 border-accent shadow-lg object-cover"
          />

          <!-- Ikon pensil di border bawah kanan -->
          <label for="foto" 
                 class="absolute -bottom-1 -right-1 bg-T1 text-white p-2 rounded-full shadow cursor-pointer 
                        border-2 border-white hover:scale-100 transition"
                 title="Pilih foto">
            <i class='bx  bx-pencil'  ></i> 
          </label>

          <input type="file" id="foto" name="foto" accept="image/*" class="hidden" onchange="previewFile(event)">
        </div>

        <!-- Tombol Simpan -->
        <button type="submit"
                class="w-full px-5 py-2 rounded-xl bg-T1 text-white font-semibold shadow hover:bg-opacity-90 transition">
          Simpan Foto
        </button>

        <!-- Tombol Batal -->
        <a href="{{ route('dokter.dashboard') }}"
           class="block w-full px-5 py-2 rounded-xl border border-gray-300 text-gray-600 font-semibold hover:bg-gray-100 transition">
          Batal
        </a>
      </form>

    </div>
  </div>
@endsection