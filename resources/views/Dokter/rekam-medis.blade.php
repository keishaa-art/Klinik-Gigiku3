@extends('layouts.dokter-layout')

@section('konten')  
 <!-- Konten -->
  <h1 class="text-3xl font-bold text-T2 mb-6">Riwayat Medis</h1>

    <!-- Riwayat Pemeriksaan -->
    <div id="riwayat" class="tab-content hidden">
      <div class="bg-white border-2 border-accent rounded-lg p-6 mb-6 shadow">
        <h2 class="text-2xl font-semibold text-T2 mb-4">Riwayat Pemeriksaan</h2>
        <ul class="list-disc pl-5 space-y-2">
          <li>08 Agustus 2025 - Rina Ayu - Scaling</li>
          <li>06 Agustus 2025 - Dedi Saputra - Pencabutan Gigi</li>
          <li>05 Agustus 2025 - Maya Sari - Konsultasi</li>
        </ul>
      </div>
    </div>
  </div>
@endsection
