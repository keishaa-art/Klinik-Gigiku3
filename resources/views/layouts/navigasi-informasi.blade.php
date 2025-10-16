@extends('layouts.index')
@section('konten')  
  <style>
    :root { --ring:#dd7986; }
    html { scroll-behavior:smooth; }
    body { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"; }
    /* simple marquee */
    @keyframes marquee {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .marquee-track { animation: marquee 25s linear infinite; }
    /* card hover ring */
    .hover-ring:hover { box-shadow: 0 0 0 3px var(--ring) inset; }
  </style>
</head>
<body class="bg-white text-[#f08080]">
  <!-- Hero -->
  <section class="relative overflow-hidden">
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-rose-50 via-white to-white"></div>
    <div class="max-w-7xl mx-auto px-4 py-16 md:py-24 grid md:grid-cols-2 gap-10 items-center">
      <div>
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-100 text-teal-700 text-sm font-medium">💎 Promo Spesial Bulan Ini</span>
        <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-tight">Promo <span class="text-[#f25c5c]">Gigiku Dental Clinic</span></h1>
        <p class="mt-4 text-slate-600 text-lg">Nikmati perawatan gigi berkualitas dengan harga lebih hemat.Beragam promo tersediaa.</p>
        <div class="mt-6 flex flex-wrap gap-3">
          <a href="#promo" class="px-5 py-3 rounded-xl bg-[#f25c5c] text-white hover:opacity-90">Lihat Promo</a>
          <a href="#appointment" class="px-5 py-3 rounded-xl border border-slate-300 hover:bg-slate-50">Buat Janji</a>
        </div>
        <div class="mt-6 flex items-center gap-6 text-sm text-slate-600">
          <div class="flex items-center gap-2"><span class="inline-block h-2 w-2 bg-[#f25c5c] rounded-full"></span>Dentist Berpengalaman</div>
        </div>
      </div>
      <div class="relative">
        <div class="aspect-[4/3] rounded-3xl bg-white shadow-xl ring-1 ring-slate-100 p-4 grid place-items-center">
          <div class="grid grid-cols-3 gap-3 w-full">
            <div class="h-28 rounded-2xl bg-gradient-to-br from-rose-200 to-white flex flex-col items-center justify-center text-center p-3 hover-ring">
              <span class="text-3xl font-extrabold text-[#f06969]">25%</span>
              <span class="text-sm text-rose-400">Scaling & Polishing</span>
            </div>
            <div class="h-28 rounded-2xl bg-gradient-to-br from-rose-100 to-white flex flex-col items-center justify-center text-center p-3 hover-ring">
              <span class="text-3xl font-extrabold text-rose-600">IDR 999k</span>
              <span class="text-sm text-rose-400">Teeth Whitening</span>
            </div>
            <div class="h-28 rounded-2xl bg-gradient-to-br from-rose-100 to-white flex flex-col items-center justify-center text-center p-3 hover-ring">
              <span class="text-3xl font-extrabold text-[#f06969]">Buy 1 Get 1</span>
              <span class="text-sm text-rose-400">Consultation</span>
            </div>
            <div class="col-span-3 h-40 rounded-2xl bg-slate-50 border border-slate-100 grid place-items-center p-6 text-center overflow-hidden">
  <img src="img/Screenshot 2025-09-02 111022.png" alt=""
       class="max-h-full max-w-full object-contain" />
</div>

            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Promo Grid -->
  <section id="promo" class="py-16">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex items-end justify-between gap-4 mb-8">
        <div>
          <h2 class="text-2xl md:text-3xl font-extrabold">Penawaran Spesial</h2>
          <p class="text-slate-600">Update konten ini sesuai promo yang aktif. Badge masa berlaku & syarat ketentuan disediakan.</p>
        </div>
        <div class="flex items-center gap-2">
          <input id="searchInput" type="search" placeholder="Cari promo…" class="w-44 md:w-72 px-4 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-teal-400" />
        </div>
      </div>

      <div id="promoGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card template items (placeholders) -->
        <article class="group rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all" data-title="Scaling Polishing">
          <div class="p-5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs rounded-full bg-rose-100 text-rose-400">Hingga 25%</span>
              <span class="text-xs text-">Berlaku s.d. <time datetime="2025-12-31">31 Des 2025</time></span>
            </div>
            <h3 class="mt-3 text-lg font-bold">Scaling & Polishing</h3>
            <p class="mt-1  text-slate-500">Pembersihan tartar + pemolesan untuk senyum lebih cerah.</p>
            <ul class="mt-3 text-sm  text-slate-500 space-y-1 list-disc list-inside">
              <li>Gratis konsultasi awal</li>
              <li>Pembayaran cicilan tersedia</li>
            </ul>
            <div class="mt-4 flex items-center gap-2">
              <button class="px-3 py-2 rounded-lg bg-rose-400 text-white text-sm hover:opacity-90" onclick="copyCode('SCALE25')">Copy Code</button>
              <span class="text-xs text-rose-400"><code id="code-SCALE25"></code></span>
            </div>
          </div>
        </article>

        <article class="group rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all" data-title="Teeth Whitening">
          <div class="p-5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-700">Special Price</span>
              <span class="text-xs text-black">S&K berlaku</span>
            </div>
            <h3 class="mt-3 text-lg font-bold">Teeth Whitening</h3>
            <p class="mt-1  text-slate-500">Harga paket mulai dari <strong>IDR 999K</strong> untuk senyum yang lebih putih.</p>
            <ul class="mt-3 text-sm  text-slate-500 space-y-1 list-disc list-inside">
              <li>Termasuk konsultasi</li>
              <li>Hasil cepat & aman</li>
            </ul>
            <div class="mt-4">
              <a href="#appointment" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg border border-slate-300 hover:bg-slate-50 text-sm">Buat Janji
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
              </a>
            </div>
          </div>
        </article>

        <article class="group rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all" data-title="Konsultasi Dokter Gigi">
          <div class="p-5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs rounded-full bg-rose-100 text-rose-700">Buy 1 Get 1</span>
              <span class="text-xs text-slate-500">Weekend Only</span>
            </div>
            <h3 class="mt-3 text-lg font-bold">Konsultasi Dokter Gigi</h3>
            <p class="mt-1 text-slate-600">Gratis konsultasi untuk 1 teman/keluarga di kunjungan yang sama.</p>
            <div class="mt-4">
              <a href="#faq" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-rose-600 text-white text-sm hover:opacity-90">Lihat S&K</a>
            </div>
          </div>
        </article>

        <article class="group rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all" data-title="Behel Orthodontic">
          <div class="p-5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs rounded-full bg-rose-100 text-rose-400">Cicilan 0%</span>
              <span class="text-xs text-slate-500">Partner Finance</span>
            </div>
            <h3 class="mt-3 text-lg font-bold">Behel / Orthodontic</h3>
            <p class="mt-1 text-slate-600">Mulai cicilan 0%—syarat ketentuan berlaku.</p>
            <div class="mt-4 flex items-center gap-2">
              <button class="px-3 py-2 rounded-lg bg-rose-400 text-white text-sm hover:opacity-90" onclick="copyCode('BRACE0')">Ajukan</button>
              <span class="text-xs text-slate-500"><code id="code-BRACE0"></code></span>
            </div>
          </div>
        </article>

        <article class="group rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all" data-title="Tambal Gigi Estetik">
          <div class="p-5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs rounded-full bg-pink-200 text-rose-400">Bundle</span>
              <span class="text-xs text-slate-500">Hemat s.d. 20%</span>
            </div>
            <h3 class="mt-3 text-lg font-bold">Tambal Gigi Estetik</h3>
            <p class="mt-1 text-slate-600">Bundle 3 gigi tambal lebih hemat dibanding satuan.</p>
            <div class="mt-4">
              <a href="#appointment" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg border border-slate-300 hover:bg-slate-50 text-sm">Ambil Paket</a>
            </div>
          </div>
        </article>

        <article class="group rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all" data-title="Scaling Anak">
          <div class="p-5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-1 text-xs rounded-full bg-rose-100 text-rose-400">Family</span>
              <span class="text-xs text-slate-500">Anak (6–12)</span>
            </div>
            <h3 class="mt-3 text-lg font-bold">Scaling Anak</h3>
            <p class="mt-1 text-slate-600">Pembersihan gigi khusus anak dengan pendekatan ramah.</p>
            <div class="mt-4">
              <a href="#appointment" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-rose-400 text-white text-sm hover:opacity-90">Book Sekarang</a>
            </div>
          </div>
        </article>
      </div>
    </div>

    <!-- S&K berlaku -->
      <div class="max-w-2xl mx-auto text-center mt-12 mb-8">
      <h3 class="text-lg font-bold text-rose-600">Catatan & Syarat Umum</h3>
      <ul class="mt-3 space-y-2 text-slate-600 text-sm list-disc list-inside text-left inline-block text-start">
        <li>Promo tidak dapat digabung dengan promo lainnya (kecuali tertulis).</li>
        <li>Periode promo, kuota dan layanan dapat berubah sewaktu-waktu.</li>
       <li>Untuk klaim asuransi, pastikan polis aktif & dokumen lengkap.</li>
  </ul>
        <a href="#faq" class="mt-4 inline-flex items-center gap-2 text-rose-500 hover:text-rose-600">
         Baca FAQ
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
      <path d="M12 3a9 9 0 1 1 0 18 9 9 0 0 1 0-18Zm-.75 5.25a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5Zm0 3a.75.75 0 0 0 0 1.5h.75V15a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-.75-.75h-1.5Z"/>
    </svg>
  </a>
</div>
  </section>

  <!-- Artikel Kesehatan Gigi -->
<section id="artikel" class="py-12 bg-gradient-to-r from-[#f2b8ac] to-white border-y border-pink-200">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-xl md:text-2xl font-extrabold text-[#f08080]">Artikel Kesehatan Gigi</h2>
      <div class="flex gap-2">
        <button id="prevArtikel" class="p-2 rounded-full bg-white border border-pink-300 hover:bg-pink-100">
          &#10094;
        </button>
        <button id="nextArtikel" class="p-2 rounded-full bg-white border border-pink-300 hover:bg-pink-100">
          &#10095;
        </button>
      </div>
    </div>
    <div class="relative overflow-hidden">
      <div id="artikelTrack" class="flex gap-6 transition-transform duration-500">
        <!-- Artikel 1 -->
        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 1" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Tips Menyikat Gigi yang Benar</h3>
          <p class="text-sm text-gray-600 mt-2">Menyikat gigi minimal dua kali sehari dapat mencegah plak dan menjaga kesehatan mulut...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>

        <!-- Artikel 2 -->
        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 2" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Bahaya Gula Bagi Gigi Anak</h3>
          <p class="text-sm text-gray-600 mt-2">Konsumsi gula berlebih bisa menyebabkan gigi berlubang. Ajarkan anak membatasi asupan manis...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>

        <!-- Artikel 3 -->
        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 3" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Manfaat Dental Check-Up Rutin</h3>
          <p class="text-sm text-gray-600 mt-2">Pemeriksaan gigi rutin setiap 6 bulan dapat membantu mendeteksi masalah lebih awal...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>

        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 3" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Manfaat Dental Check-Up Rutin</h3>
          <p class="text-sm text-gray-600 mt-2">Pemeriksaan gigi rutin setiap 6 bulan dapat membantu mendeteksi masalah lebih awal...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>

        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 3" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Manfaat Dental Check-Up Rutin</h3>
          <p class="text-sm text-gray-600 mt-2">Pemeriksaan gigi rutin setiap 6 bulan dapat membantu mendeteksi masalah lebih awal...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>

        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 3" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Manfaat Dental Check-Up Rutin</h3>
          <p class="text-sm text-gray-600 mt-2">Pemeriksaan gigi rutin setiap 6 bulan dapat membantu mendeteksi masalah lebih awal...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>

        <article class="min-w-[300px] md:min-w-[400px] bg-white rounded-xl shadow p-4">
          <img src="https://via.placeholder.com/400x200" alt="Artikel 3" class="rounded-lg mb-3">
          <h3 class="font-bold text-lg text-gray-800">Manfaat Dental Check-Up Rutin</h3>
          <p class="text-sm text-gray-600 mt-2">Pemeriksaan gigi rutin setiap 6 bulan dapat membantu mendeteksi masalah lebih awal...</p>
          <a href="#" class="mt-3 inline-block text-[#f08080] font-semibold hover:underline">Baca selengkapnya</a>
        </article>
      </div>
    </div>
  </div>
</section>

<script>
  const artikelTrack = document.getElementById('artikelTrack');
  const prevArtikel = document.getElementById('prevArtikel');
  const nextArtikel = document.getElementById('nextArtikel');

  let posisi = 0;
  const geser = 420; // lebar artikel + gap

  prevArtikel.addEventListener('click', () => {
    posisi += geser;
    artikelTrack.style.transform = `translateX(${posisi}px)`;
  });

  nextArtikel.addEventListener('click', () => {
    posisi -= geser;
    artikelTrack.style.transform = `translateX(${posisi}px)`;
  });
</script>

  <!-- Testimonials -->
  <section id="testimoni" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex items-end justify-between mb-8">
        <div>
          <h2 class="text-2xl md:text-3xl font-extrabold">Apa kata pasien kami</h2>
          <p class="text-slate-600">Cuplikan testimoni — ganti dengan konten asli.</p>
        </div>
        <div class="flex gap-2">
          <button id="prevBtn" class="p-2 rounded-xl border border-slate-300" aria-label="Sebelumnya">◀</button>
          <button id="nextBtn" class="p-2 rounded-xl border border-slate-300" aria-label="Berikutnya">▶</button>
        </div>
      </div>
      <div class="relative overflow-hidden">
        <div id="slider" class="flex transition-transform duration-500">
          <!-- Slide 1 -->
          <figure class="min-w-full p-6">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
              <blockquote class="text-slate-700">“Dokternya ramah dan informatif. Hasil scaling bersih banget!”</blockquote>
              <figcaption class="mt-4 text-sm text-slate-500">— Rani, Jakarta</figcaption>
            </div>
          </figure>
          <!-- Slide 2 -->
          <figure class="min-w-full p-6">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
              <blockquote class="text-slate-700">“Klaim asuransi cashless gampang, prosesnya cepat.”</blockquote>
              <figcaption class="mt-4 text-sm text-slate-500">— Bagus, Depok</figcaption>
            </div>
          </figure>
          <!-- Slide 3 -->
          <figure class="min-w-full p-6">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
              <blockquote class="text-slate-700">“Whitening-nya worth it, senyum jadi makin pede ✨.”</blockquote>
              <figcaption class="mt-4 text-sm text-slate-500">— Sinta, Bekasi</figcaption>
            </div>
          </figure>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="py-16">
    <div class="max-w-3xl mx-auto px-4">
      <h2 class="text-2xl md:text-3xl font-extrabold">Pertanyaan yang sering ditanyakan</h2>
      <div class="mt-6 divide-y divide-slate-200 border-y border-slate-200 rounded-2xl">
        <details class="group p-4">
          <summary class="flex cursor-pointer items-center justify-between list-none">
            <span class="font-semibold">Apakah promo bisa digabung?</span>
            <span class="transition-transform group-open:rotate-180">⌄</span>
          </summary>
          <p class="mt-2 text-slate-600">Kecuali tertulis, promo tidak dapat digabung dengan promo lain.</p>
        </details>
        <details class="group p-4">
          <summary class="flex cursor-pointer items-center justify-between list-none">
            <span class="font-semibold">Bagaimana cara klaim asuransi?</span>
            <span class="transition-transform group-open:rotate-180">⌄</span>
          </summary>
          <p class="mt-2 text-slate-600">Pastikan polis aktif, siapkan kartu asuransi & identitas, lalu sampaikan ke resepsionis.</p>
        </details>
        <details class="group p-4">
          <summary class="flex cursor-pointer items-center justify-between list-none">
            <span class="font-semibold">Apakah ada cicilan 0%?</span>
            <span class="transition-transform group-open:rotate-180">⌄</span>
          </summary>
          <p class="mt-2 text-slate-600">Ya, untuk layanan tertentu melalui partner yang bekerja sama.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="appointment" class="py-16">
    <div class="max-w-7xl mx-auto px-4">
      <div class="rounded-3xl bg-gradient-to-r from-[#f2a494] to-[#f2a490] text-white p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
          <h2 class="text-2xl md:text-3xl font-extrabold">Siap mulai senyum lebih percaya diri?</h2>
          <p class="mt-2 text-teal-50">Booking jadwal atau chat tim kami untuk rekomendasi perawatan.</p>
        </div>
        <div class="flex gap-3">
          <a href="#" class="px-5 py-3 rounded-xl bg-white/10 border border-white/20 hover:bg-white/20">Cek Jadwal</a>
          <button class="px-5 py-3 rounded-xl bg-white text-teal-800" onclick="openChat()">Chat Us Now</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="contact" class="bg-[#f2b8ac] border-t border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8">
      <div class="md:col-span-2">
        <div class="flex items-center gap-2 font-extrabold text-xl">
          <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14" />
          <!-- <span class="inline-flex h-9 w-9 rounded-2xl bg-teal-600 text-white items-center justify-center">G</span>
          <span>Gigiku Dental Clinic</span> -->
        </div>
        <p class="mt-3 text-slate-600 text-sm"> Jl. Kartini No.61/63, Kejaksan, Kec. Kejaksan, Kota Cirebon, Jawa Barat 45123</p>
      </div>
      <div>
        <h4 class="font-semibold">Home</h4>
        <ul class="mt-2 space-y-2 text-sm text-slate-600">
          <li><a class="hover:text-teal-700" href="#promo">About us</a></li>
          <li><a class="hover:text-teal-700" href="#insurance">Promo</a></li>
          <li><a class="hover:text-teal-700" href="#faq">Dokter</a></li>
          <li><a class="hover:text-teal-700" href="#appointment">Appointment</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold">Kontak</h4>
        <ul class="mt-2 space-y-2 text-sm text-slate-600">
          <li>Email: hello@gigiku.co</li>
          <li>WhatsApp: 0877-3030-3063</li>
        </ul>
      </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 mt-8 text-xs text-slate-500">© <span id="year"></span> Gigiku Dental Clinic. All rights reserved.</div>
  </footer>

  <script>
    // mobile nav toggle
    const btnMenu = document.getElementById('btnMenu');
    const mobileNav = document.getElementById('mobileNav');
    btnMenu?.addEventListener('click', () => {
      mobileNav.classList.toggle('hidden');
    });

    // chat button placeholder
    function openChat(){
      alert('Fungsi chat disini bisa dihubungkan ke WhatsApp / widget live chat.');
    }

    // copy code helper
    function copyCode(code){
      const text = document.getElementById('code-' + code)?.textContent || code;
      navigator.clipboard.writeText(text).then(() => {
        const msg = document.createElement('div');
        msg.textContent = 'Kode "' + text + '" disalin!';
        msg.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-4 py-2 rounded-xl shadow-lg';
        document.body.appendChild(msg);
        setTimeout(()=> msg.remove(), 2000);
      });
    }

    // simple search filter
    const searchInput = document.getElementById('searchInput');
    const promoGrid = document.getElementById('promoGrid');
    const cards = Array.from(promoGrid.querySelectorAll('article'));
    searchInput?.addEventListener('input', (e)=>{
      const q = e.target.value.toLowerCase();
      cards.forEach(card =>{
        const title = (card.dataset.title || card.querySelector('h3')?.textContent || '').toLowerCase();
        card.style.display = title.includes(q) ? '' : 'none';
      })
    });

    // slider testimonials
    const slider = document.getElementById('slider');
    const slides = slider ? Array.from(slider.children) : [];
    let index = 0;  
    function goTo(i){
      index = (i + slides.length) % slides.length;
      slider.style.transform = `translateX(-${index * 100}%)`;
    }
    document.getElementById('prevBtn')?.addEventListener('click', ()=> goTo(index-1));
    document.getElementById('nextBtn')?.addEventListener('click', ()=> goTo(index+1));
    let auto = setInterval(()=> goTo(index+1), 5000);
    slider?.addEventListener('mouseenter', ()=> clearInterval(auto));
    slider?.addEventListener('mouseleave', ()=> auto = setInterval(()=> goTo(index+1), 5000));

    // year
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
