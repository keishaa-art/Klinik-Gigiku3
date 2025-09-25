
@extends('layouts.index')

@section('konten')  

<script>

  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: [
            "Instrument Sans",
            "ui-sans-serif",
            "system-ui",
            "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                  ],
                },
                colors: {
                  soft: "#FFE6E1",
                  accent: "#F0BAAF",
                T1: "#A85050",
                T2: "#C75E5E",
                primary: "#f8f8f8"
            },
          },
    },
  };
  
  </script>

 <!-- Hero -->
  <section class="pt-20 sm:pt-24 bg-gradient-to-r from-soft to-accent text-center text-T2 px-4">
    <div class="max-w-3xl h-[260px] mx-auto">
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">GIGIKU DENTAL CLINIC</h1>
      <p class="mt-3 text-sm sm:text-base md:text-lg text-T2">
        Our mission is to create trust, comfort, and serenity for patients in getting the best dental treatments and medications. 
        <span class="font-semibold">20.000+ cases</span> have been handled well by our professional dentist.
      </p>
      <button class="mt-6 px-6 py-2 bg-T1 text-white font-semibold rounded-lg hover:bg-T2 transition">Learn More</button>
    </div>
  </section>

  <!-- Stats -->
  <section class="py-12 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-center">
      <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-T2">Expert Care for Your Dream Smile</h2>
      <p class="mt-2 max-w-2xl mx-auto text-sm sm:text-base text-T2">Menggabungkan teknologi canggih dengan perawatan ahli, kami memberikan solusi gigi yang tepat dan personal untuk senyum Anda.</p>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-10">
        <div class="border-b sm:border-b-0 sm:border-r border-T1 pb-6 sm:pb-0 sm:pr-4">
          <p class="text-5xl sm:text-6xl md:text-7xl font-bold text-T1">20<span class="text-T2 text-xl relative bottom-2">K</span></p>
          <p class="mt-2 text-sm md:text-base">Lebih dari 20.000 pasien</p>
        </div>
        <div class="border-b sm:border-b-0 sm:border-r border-T1 pb-6 sm:pb-0 sm:pr-4">
          <p class="text-5xl sm:text-6xl md:text-7xl font-bold text-T1">40<span class="text-T2 text-xl relative bottom-2">K</span></p>
          <p class="mt-2 text-sm md:text-base">Lebih dari 40.000 perawatan berhasil</p>
        </div>
        <div>
          <p class="text-5xl sm:text-6xl md:text-7xl font-bold text-T1">5<span class="text-T2 text-xl relative bottom-2">+</span></p>
          <p class="mt-2 text-sm md:text-base">Klinik gigi dengan pengalaman bintang lima</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery Swiper -->
  <section class="py-10 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- contoh gambar -->
          <div class="swiper-slide"><img src="https://tse3.mm.bing.net/th/id/OIP.vW2vYWEEYuTXBg_ABAorDwHaEK?pid=Api&P=0&h=180" class="rounded-lg shadow w-full h-auto object-cover" alt="Foto 1"></div>
          <div class="swiper-slide"><img src="https://tse3.mm.bing.net/th/id/OIP.vW2vYWEEYuTXBg_ABAorDwHaEK?pid=Api&P=0&h=180" class="rounded-lg shadow w-full h-auto object-cover" alt="Foto 2"></div>
          <div class="swiper-slide"><img src="https://tse3.mm.bing.net/th/id/OIP.vW2vYWEEYuTXBg_ABAorDwHaEK?pid=Api&P=0&h=180" class="rounded-lg shadow w-full h-auto object-cover" alt="Foto 3"></div>
            <div class="swiper-slide"><img src="https://tse3.mm.bing.net/th/id/OIP.vW2vYWEEYuTXBg_ABAorDwHaEK?pid=Api&P=0&h=180" class="rounded-lg shadow w-full h-auto object-cover" alt="Foto 3"></div>
        </div>
        <div class="galeri-next swiper-button-next text-T2"></div>
        <div class="galeri-prev swiper-button-prev text-T2"></div>
      </div>
    </div>
  </section>

  <!-- Layanan -->
  <section class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-2xl sm:text-3xl font-bold text-center text-T2 mb-6">Layanan Kami</h2>
      <div class="swiper layananSwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="relative w-32 h-24 rounded-lg overflow-hidden shadow mx-auto">
              <img src="https://tse3.mm.bing.net/th/id/OIP.plzgnVEuqx24PBD7avNQngHaEh?pid=Api&P=0&h=180" class="w-full h-full object-cover">
              <div class="absolute top-0 left-0 bg-rose-400 text-white text-xs px-2 py-1 rounded-br-md">Operasi Gigi Bungsu</div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="relative w-32 h-24 rounded-lg overflow-hidden shadow mx-auto">
              <img src="https://tse3.mm.bing.net/th/id/OIP.plzgnVEuqx24PBD7avNQngHaEh?pid=Api&P=0&h=180" class="w-full h-full object-cover">
              <div class="absolute top-0 left-0 bg-rose-400 text-white text-xs px-2 py-1 rounded-br-md">Operasi Gigi Bungsu</div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="relative w-32 h-24 rounded-lg overflow-hidden shadow mx-auto">
              <img src="https://tse3.mm.bing.net/th/id/OIP.plzgnVEuqx24PBD7avNQngHaEh?pid=Api&P=0&h=180" class="w-full h-full object-cover">
              <div class="absolute top-0 left-0 bg-rose-400 text-white text-xs px-2 py-1 rounded-br-md">Operasi Gigi Bungsu</div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="relative w-32 h-24 rounded-lg overflow-hidden shadow mx-auto">
              <img src="https://tse3.mm.bing.net/th/id/OIP.plzgnVEuqx24PBD7avNQngHaEh?pid=Api&P=0&h=180" class="w-full h-full object-cover">
              <div class="absolute top-0 left-0 bg-rose-400 text-white text-xs px-2 py-1 rounded-br-md">Operasi Gigi Bungsu</div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="relative w-32 h-24 rounded-lg overflow-hidden shadow mx-auto">
              <img src="https://tse3.mm.bing.net/th/id/OIP.plzgnVEuqx24PBD7avNQngHaEh?pid=Api&P=0&h=180" class="w-full h-full object-cover">
              <div class="absolute top-0 left-0 bg-rose-400 text-white text-xs px-2 py-1 rounded-br-md">Operasi Gigi Bungsu</div>
            </div>
          </div>
          <!-- tambahkan slide lain sama format -->
        </div>
        <div class="layanan-next swiper-button-next text-rose-400"></div>
        <div class="layanan-prev swiper-button-prev text-rose-400"></div>
      </div>
    </div>
  </section>

 <!-- Appointment -->
<section class="bg-gray-50 py-12">
  <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-8">
    
    <!-- Gambar -->
    <div class="flex justify-center">
      <img src="/img/gigi.png" alt="Gambar Janji Temu" class="max-w-[220px] w-full h-auto">
    </div>
    
    <!-- Teks -->
    <div class="text-center md:text-left text-T2">
      <h3 class="text-2xl font-bold text-[#a84e4e]">Jadwal Janji Temu</h3>
      <p class="mt-3 text-sm sm:text-base max-w-md">
        Senyum sempurnamu tak ternilai harganya—jangan jadikan waktu alasan. Pesan sekarang!
      </p>
      <button class="mt-5 inline-flex items-center gap-2 bg-[#a84e4e] text-white font-semibold px-5 py-2 rounded-lg shadow hover:bg-[#8d3e3e] transition">
        Buat Janji Temu
        <!-- Ikon kalender (Heroicons) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </button>
    </div>

  </div>
</section>


  <!-- Location -->
  <section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 text-center">
      <h2 class="text-xl sm:text-2xl font-bold text-T2">See Where We're Located</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white p-4 rounded-lg shadow-md ">
          <img src="https://static.wixstatic.com/media/40fb91_e54e0dcb1c234f9b8dc2cc1897fd42ac~mv2.jpg/v1/fill/w_287,h_183,al_c,q_80,enc_avif,quality_auto/lobby_edited.jpg" class="rounded mb-2 w-full h-40 object-cover">
          <p class="font-bold text-T2 text-left">Cirebon</p>
          <p class="text-sm text-T2 text-left">JL. Raden Ajeng Kartini No. 61/63Kec. Kejaksan Kota Cirebon,Jawa Barat</p>
          <div class="">
           <button class=" inline-flex items-center gap-2 bg-[#a84e4e] text-white font-semibold text-sm px-32 mt-2 rounded-lg shadow hover:bg-[#8d3e3e] transition">view</button>
                     </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md ">
          <img src="https://static.wixstatic.com/media/40fb91_5d75b18e85c64b4dbb50bda01ac9a5ec~mv2.jpg/v1/crop/x_0,y_1070,w_2592,h_1668/fill/w_283,h_179,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/facad%20fix.jpg" class="rounded mb-2 w-full h-40 object-cover">
          <p class="font-bold text-T2 text-left">Jababeka, Cikarang</p>
          <p class="text-sm text-T2 text-left">Ruko Terace Blok B.18, No. 3 Desa Simpangan,(Seberang Grand Mosque Al-Azhar of Jababeka)Kec. Cikarang Utara Kab. Bekasi, Jawa Barat.</p>
           <div class="">
           <button class=" inline-flex items-center gap-2 bg-[#a84e4e] text-white font-semibold text-sm px-32 mt-2 rounded-lg shadow hover:bg-[#8d3e3e] transition">view</button>
                     </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md ">
          <img src="https://static.wixstatic.com/media/40fb91_7e0fdf1df3ca4155b7018c997191caae~mv2.jpg/v1/fill/w_287,h_183,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/DSCF1214.jpg" class="rounded mb-2 w-full h-40 object-cover">
          <p class="font-bold text-T2 text-left">KBP, Bandung</p>
          <p class="text-sm text-T2 text-left">Ruko Pancawarna No.29Kota Baru ParahyanganKab. Bandung Barat</p>
           <div class="">
           <button class=" inline-flex items-center gap-2 bg-[#a84e4e] text-white font-semibold text-sm px-32 mt-2 rounded-lg shadow hover:bg-[#8d3e3e] transition">view</button>
                     </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const galeriSwiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 20,
      loop: true,
      navigation: { nextEl: ".galeri-next", prevEl: ".galeri-prev" },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
      }
    });

    const layananSwiper = new Swiper(".layananSwiper", {
      slidesPerView: 4,
      spaceBetween: 20,
      loop: true,
      autoplay: { delay: 2500, disableOnInteraction: false },
      navigation: { nextEl: ".layanan-next", prevEl: ".layanan-prev" },
      breakpoints: {
        320: { slidesPerView: 2 },
        640: { slidesPerView: 3 },
        1024: { slidesPerView: 4 }
      }
    });
  </script>

@endsection