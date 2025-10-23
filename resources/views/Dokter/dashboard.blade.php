@extends('layouts.dokter-layout')

@section('konten')  
 <!-- Konten -->
  <h1 class="text-3xl font-bold text-T2 mb-6">Dashboard Dokter</h1>
  
  <!-- Tabs -->
  <div class="bg-white border-2 border-accent rounded-lg p-6 mb-6 shadow">
    <div class="relative border-b border-gray-200 mb-6">
      <div id="tabButtons" class="flex gap-8">
        <button onclick="showTab('jadwal', this)" class="tab-btn py-2 text-T2/60">Jadwal Reservasi</button>
        <button onclick="showTab('profil', this)" class="tab-btn py-2 text-T2/60">Profil Dokter</button>
      </div>
      <!-- indikator garis bawah -->
      <div id="tabIndicator" class="absolute bottom-0 h-[3px] bg-T2 transition-all duration-300"></div>
    </div>
    
    <!-- Jadwal Reservasi -->
    <div id="jadwal" class="tab-content">
      <div class="bg-white border-2 border-accent rounded-lg p-6 mb-6 shadow">
        <h2 class="text-2xl font-semibold text-T2 mb-4">Jadwal Reservasi</h2>
        <table class="w-full text-left border">
          <thead>
            <tbody>
            <tr class="bg-gradient-to-r from-soft to-accent text-T2">
              <th class="p-2">Nama Pasien</th>
              <th class="p-2">Tanggal</th>
              <th class="p-2">Jam</th>
              <th class="p-2">Layanan</th>
            </tr>
            <tr class="border-t">
            </tr>
          </thead>
        </tbody>
      </table>
    </div>
  </div>
      
      <!-- Profil Dokter -->
<div id="profil" class="tab-content hidden">
  <div class="bg-white border-2 border-accent rounded-2xl p-8 mb-6 shadow-xl">

    <!-- Header Profil -->
    <div class="flex flex-col items-center text-center mb-10">
      <div class="relative group">
        <img 
          src="{{ $dokter && $dokter->foto ? asset('storage/'.$dokter->foto) : asset('img/default-profile.png') }}"
          alt="Foto Dokter"
          class="w-40 h-40 rounded-full border-4 border-T1 object-cover shadow-md transition duration-300 group-hover:scale-105"
        />

        <!-- Ikon pensil -->
        <a href="{{ route('dokter.profile.create') }}"
          class="absolute bottom-2 right-2 bg-T1 text-white p-2 rounded-full shadow-md border-2 border-white 
          hover:bg-opacity-90 transition transform hover:scale-110"
          title="Ubah Foto Profil">
          <i class='bx  bx-pencil'  ></i> 
        </a>
      </div>

<!-- Nama + Spesialis dengan animasi glow -->
<div class="text-center mt-6">
  <h3 class="text-3xl font-bold bg-gradient-to-r from-T1 via-T2 to-accent bg-clip-text text-transparent 
             animate-glow-pulse drop-shadow-md">
    Drg. {{ $dokter->name ?? 'Nama Tidak Tersedia' }}
  </h3>
  <p class="mt-1 text-lg font-semibold text-T2/80 animate-pulse-slow">
    {{ $dokter->spesialis ?? 'Dokter Umum' }}
  </p>
</div>

<!-- Tambahkan CSS animasi di bawah -->
<style>
@keyframes glowPulse {
  0%, 100% {
    text-shadow: 0 0 10px rgba(200, 90, 90, 0.4),
                 0 0 20px rgba(200, 90, 90, 0.2);
  }
  50% {
    text-shadow: 0 0 20px rgba(200, 90, 90, 0.7),
                 0 0 40px rgba(200, 90, 90, 0.4);
  }
}
.animate-glow-pulse {
  animation: glowPulse 2.5s ease-in-out infinite;
}

@keyframes pulseSlow {
  0%, 100% {
    opacity: 0.9;
  }
  50% {
    opacity: 1;
    transform: scale(1.03);
  }
}
.animate-pulse-slow {
  animation: pulseSlow 3s ease-in-out infinite;
}
</style>


      <div class="mt-3 flex items-center gap-2">
        <span class="inline-block px-3 py-1 bg-soft text-T2 rounded-full text-xs font-semibold">
          {{ $dokter->jenis_kelamin ?? '-' }}
        </span>
        <span class="inline-block px-3 py-1 bg-soft text-T2 rounded-full text-xs font-semibold">
          {{ \Carbon\Carbon::parse($dokter->tgl_lahir)->format('d M Y') ?? '-' }}
        </span>
      </div>
    </div>

<!-- Info Dokter -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
  @php
    $infoList = [
      ['label' => '📧 Email', 'value' => $dokter->user->email ?? '-'],
      ['label' => '📱 Nomor HP', 'value' => $dokter->no_telepon ?? '-'],
      ['label' => '🏠 Alamat', 'value' => $dokter->alamat ?? '-'],
      ['label' => '🏥 Cabang', 'value' => $dokter->cabang->nama ?? '-'],
      ['label' => '🆔 NIP', 'value' => $dokter->nip ?? '-'],
      ['label' => '⚕️ Spesialis', 'value' => $dokter->spesialis ?? '-'],
    ];
  @endphp

  @foreach($infoList as $info)
    <div 
      class="bg-gradient-to-br from-soft to-accent text-T2 rounded-xl p-5 shadow-sm 
             transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:-translate-y-1 cursor-pointer">
      <p class="font-semibold text-sm text-gray-700">{{ $info['label'] }}</p>
      <p class="text-base font-medium mt-1 break-words">{{ $info['value'] }}</p>
    </div>
  @endforeach
</div>


    <!-- Tombol Edit -->
    <div class="mt-10 text-center">
      <a href="{{ route('dokter.profile.edit', $dokter->id) }}"
        class="inline-flex items-center gap-2 px-6 py-3 bg-T1 text-white font-semibold rounded-xl shadow 
        hover:bg-opacity-90 hover:shadow-lg transition">
        ✏️ Edit Profil
      </a>
    </div>
  </div>
</div>

@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {
  const tabButtons = document.querySelectorAll("[data-tab]");
  const tabContents = document.querySelectorAll(".tab-content");
  const indicator = document.getElementById("tabIndicator");

  function activateTab(tabName) {
    // Sembunyikan semua konten tab
    tabContents.forEach((content) => content.classList.add("hidden"));

    // Reset gaya semua tombol
    tabButtons.forEach((btn) => {
      btn.classList.remove("text-T1", "font-bold");
      btn.classList.add("text-T2/60");
    });

    // Tampilkan tab yang dipilih
    const activeContent = document.getElementById(tabName);
    if (activeContent) activeContent.classList.remove("hidden");

    // Aktifkan tombol tab
    const activeButton = document.querySelector(`[data-tab='${tabName}']`);
    if (activeButton) {
      activeButton.classList.add("text-T1", "font-bold");
      activeButton.classList.remove("text-T2/60");

      // Pindahkan indikator
      indicator.style.width = activeButton.offsetWidth + "px";
      indicator.style.left = activeButton.offsetLeft + "px";
    }
  }

  // Baca parameter URL
  const params = new URLSearchParams(window.location.search);
  const activeTab = params.get("tab") || "jadwal"; // Default: jadwal

  // Jalankan fungsi pertama kali
  activateTab(activeTab);

  // Tambahkan event click untuk setiap tombol
  tabButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const tabName = btn.dataset.tab;
      history.replaceState(null, "", `?tab=${tabName}`);
      activateTab(tabName);
    });
  });
});
</script>
