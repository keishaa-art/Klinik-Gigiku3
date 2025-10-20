@extends('layouts.index')
@section('konten') 
<script src="https://cdn.tailwindcss.com"></script>
<style>
  :root {
    --accent1: #d97775;
    --accent2: #eb6765;
    --accent3: #f5a5a4;
  }
</style>

<body class="bg-white text-gray-800 font-sans antialiased">
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-rose-50 via-white to-white"></div>
  <div class="max-w-7xl mx-auto p-8 mt-24">
    <div class="grid md:grid-cols-3 gap-8">
      <div class="md:col-span-2 space-y-8">
        <div class="bg-white shadow-md border border-gray-100 rounded-2xl p-6">
          <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 mb-6">
            <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-[var(--accent1)] to-[var(--accent2)] flex items-center justify-center text-white text-2xl font-bold shadow-md">
              JD
            </div>
            <div class="text-center sm:text-left">
              <h2 class="text-xl font-semibold">John Doe</h2>
              <p class="text-gray-500 text-sm"> 1990-05-15</p>
            </div>
          </div>

          <div class="grid sm:grid-cols-2 gap-y-3 text-sm">
            <div class="font-semibold text-gray-600">Nama Lengkap:</div><div>John Doe</div>
            <div class="font-semibold text-gray-600">Umur:</div><div>34 tahun</div>
            <div class="font-semibold text-gray-600">Jenis Kelamin:</div><div>Laki-laki</div>
            <div class="font-semibold text-gray-600">Alamat:</div><div>Jl. Sudirman No. 123, Jakarta</div>
            <div class="font-semibold text-gray-600">Nomor Telepon:</div><div>0812-3456-7890</div>
          </div>

          <div class="flex justify-end mt-6">
            <button class="px-5 py-2 bg-gradient-to-r from-[var(--accent1)] to-[var(--accent2)] text-white font-semibold rounded-lg shadow hover:opacity-90 transition">
              Edit Profil
            </button>
          </div>
        </div>

        <!-- Riwayat Medis -->
        <div class="bg-white shadow-md border border-gray-100 rounded-2xl p-6">
          <h3 class="text-[var(--accent2)] font-semibold mb-4">Riwayat Medis</h3>
          <div class="space-y-3">
            <div class="p-3 border-l-4 border-[var(--accent3)] bg-[var(--accent3)]/10 rounded">
              Hipertensi (2020) — Terapi obat: Amlodipine
            </div>
            <div class="p-3 border-l-4 border-[var(--accent3)] bg-[var(--accent3)]/10 rounded">
              Diabetes Tipe 2 (2018) — Kontrol gula rutin
            </div>
            <div class="p-3 border-l-4 border-[var(--accent3)] bg-[var(--accent3)]/10 rounded">
              Pemeriksaan rutin (2023) — Semua normal
            </div>
          </div>
        </div>
      </div>
      
      <aside class="space-y-8">

        <!-- Janji Temu -->
        <div class="bg-white shadow-md border border-gray-100 rounded-2xl p-6">
          <h3 class="text-[var(--accent2)] font-semibold mb-4">Janji Temu Dokter</h3>
          <div class="grid sm:grid-cols-2 gap-4">
            <div class="border-l-4 border-[var(--accent1)] bg-[var(--accent1)]/10 p-3 rounded">
              <strong>2025-10-20</strong>
              <div class="text-sm text-gray-600">14:00 • Dr. Siti</div>
            </div>
            <div class="border-l-4 border-[var(--accent2)] bg-[var(--accent2)]/10 p-3 rounded">
              <strong>2025-11-02</strong>
              <div class="text-sm text-gray-600">09:00 • Dr. Ahmad</div>
            </div>
            <div class="border-l-4 border-[var(--accent2)] bg-[var(--accent2)]/10 p-3 rounded">
              <strong>2025-11-02</strong>
              <div class="text-sm text-gray-600">09:00 • Dr. Ahmad</div>
            </div>
            <div class="border-l-4 border-[var(--accent2)] bg-[var(--accent2)]/10 p-3 rounded">
              <strong>2025-11-02</strong>
              <div class="text-sm text-gray-600">09:00 • Dr. Ahmad</div>
            </div>
          </div>
        </div>

        <!-- Aktivitas -->
        <div class="bg-white shadow-md border border-gray-100 rounded-2xl p-6">
          <h3 class="text-[var(--accent2)] font-semibold mb-4">Aktivitas</h3>
          <ul class="space-y-3 text-sm">
            <li><strong>Senin, 20 Januari 2025</strong> — Kontrol gigi</li>
            <li><strong>Rabu, 12 Januari 2025</strong> — Tambal gigi</li>
            <li><strong>Minggu, 10 Juni 2025</strong> — Scalling gigi</li>
          </ul>
        </div>

      </aside>
    </div>
  </div>
</body>
</html>
@endsection
