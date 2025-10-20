<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Dokter - Klinik Gigiku</title>

  <link rel="icon" href="{{ asset('storage/huntu.png') }}" />
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ["Istok Web", "system-ui"] },
          colors: {
            soft: "#FFE6E1",
            peach: "#FFD4C7",
            accent: "#F6B9AD",
            rose: "#E87E73",
            T1: "#C94C4C", // warna utama seperti di header gambar
            T2: "#A84040",
            light: "#FFF5F3",
          },
        },
      },
    };
  </script>

  <style>
    #tabIndicator {
  transition: all 0.3s ease;
}

    body {
      font-family: 'Istok Web', sans-serif;
      background: linear-gradient(to bottom right, #FFE8E3, #FFDAD2);
      min-height: 100vh;
    }

    /* Sidebar */
    #sidebar {
      background: linear-gradient(to bottom right, #FFD8D1, #F6B9AD);
      backdrop-filter: blur(8px);
      color: #7A2C2C;
      box-shadow: 4px 0 25px rgba(0,0,0,0.1);
      border-right: 2px solid rgba(255,255,255,0.4);
    }

    #sidebar a {
      transition: all 0.3s ease;
      border-radius: 12px;
      color: #7A2C2C;
    }

    #sidebar a:hover {
      background-color: rgba(255,255,255,0.4);
      color: #C94C4C;
      transform: translateX(4px);
    }

    /* Logo */
    .logo-text {
      font-size: 1.8rem;
      font-weight: bold;
      color: #C94C4C;
    }

    /* Tombol utama */
    .btn-primary {
      background: linear-gradient(135deg, #C94C4C, #E87E73);
      box-shadow: 0 4px 12px rgba(201, 76, 76, 0.3);
      transition: all 0.3s ease;
      color: white;
      font-weight: 600;
      border-radius: 10px;
    }

    .btn-primary:hover {
      transform: scale(1.04);
      box-shadow: 0 6px 16px rgba(201, 76, 76, 0.45);
    }

    /* Main area */
    main {
      background: linear-gradient(to bottom right, #FFF9F8, #FFEAE5);
      animation: fadeSlide 0.5s ease-out;
      border-top-left-radius: 24px;
      border-top-right-radius: 24px;
      box-shadow: inset 0 2px 6px rgba(0,0,0,0.05);
    }

    @keyframes fadeSlide {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Scrollbar lembut */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-thumb {
      background: #F6B9AD;
      border-radius: 10px;
    }

  </style>
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden">

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">
    <div class="flex flex-col h-full">

      <!-- Logo -->
      <div class="flex items-center justify-center py-6 border-b border-white/40">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 drop-shadow-md">
        <span class="logo-text ml-2">Gigiku</span>
      </div>

      <!-- Menu -->
      <nav class="flex-1 px-4 py-6 space-y-2 font-semibold text-T1/90">

        <a href="/dokter" class="flex items-center gap-3 p-3 hover:bg-white/40">
            <i class='bx  bx-home'  ></i> 
            Dashboard Dokter
        </a>

        <a href="{{ route('dokter.jadwalpraktek.index')}}" class="flex items-center gap-3 p-3 hover:bg-white/40">
           <i class='bx  bx-calendar-alt'  ></i> 
            Jadwal Pemeriksaan
        </a>

        <a href="/" class="flex items-center gap-3 p-3 hover:bg-white/40">
          <i class='bx  bx-history'  ></i> 
            Rekam Medis
        </a>

        <a href="#" class="flex items-center gap-3 p-3 hover:bg-white/40">
        <i class='bx  bx-home-alt'  ></i>     
        Home
        </a>

      </nav>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="px-4 py-4 border-t border-white/40">
          <button class="btn-primary flex items-center justify-center gap-2 w-full px-4 py-2">
          <i class='bx  bx-door-open'  ></i>   
          Logout
          </button>
        </div>
      </form>
    </div>
  </aside>

  <!-- Toggle Sidebar -->
  <button id="menuToggle" class="md:hidden fixed top-4 left-4 bg-T1 text-white p-2 rounded-lg z-50 shadow-lg hover:scale-105 transition">
    ☰
  </button>

  <!-- Main content -->
  <main class="flex-1 md:ml-64 p-8 pt-20 pb-24">
    @yield('konten')
  </main>

  <!-- 🔽 Script Utama -->
  <script>
    // Sidebar toggle
    document.getElementById('menuToggle').addEventListener('click', () => {
      document.getElementById('sidebar').classList.toggle('-translate-x-full');
    });

  function showTab(tabId, element) {
    // Sembunyikan semua konten tab
    document.querySelectorAll('.tab-content').forEach(content => {
      content.classList.add('hidden');
    });

    // Reset semua tombol
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('text-T1', 'font-bold');
      btn.classList.add('text-T2/60');
    });

    // Tampilkan tab yang dipilih
    document.getElementById(tabId).classList.remove('hidden');
    element.classList.add('text-T1', 'font-bold');
    element.classList.remove('text-T2/60');

    // Gerakkan indikator
    const indicator = document.getElementById('tabIndicator');
    indicator.style.width = element.offsetWidth + 'px';
    indicator.style.left = element.offsetLeft + 'px';
  }

  window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const tabParam = params.get('tab') || 'jadwal'; // default: jadwal

    const button = document.querySelector(`#tabButtons button[onclick*="${tabParam}"]`);
    if (button) {
      showTab(tabParam, button);
    }

    // Atur posisi indikator saat awal
    const indicator = document.getElementById('tabIndicator');
    if (button) {
      indicator.style.width = button.offsetWidth + 'px';
      indicator.style.left = button.offsetLeft + 'px';
    }
  });

 // Modal konfirmasi
    const modal = document.getElementById('confirmModal');
    const deleteForm = document.getElementById('deleteForm');
    const cancelBtn = document.getElementById('cancelBtn');

    function openModal(actionUrl) {
      deleteForm.action = actionUrl;
      modal.classList.remove('hidden');
    }

    cancelBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    // Hilangkan alert otomatis
    setTimeout(() => {
      const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
      alerts.forEach(alert => alert.style.display = 'none');
    }, 5000);

    // Preview foto (jika dipakai di form profil)
    function previewFile(event) {
      const reader = new FileReader();
      reader.onload = function() {
        const output = document.getElementById('previewImage');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
    
    document.addEventListener('DOMContentLoaded', function () {
    const jamMulai = document.getElementById('jam_mulai');
    const jamSelesai = document.getElementById('jam_selesai');
    const jamField = document.getElementById('jam');
    const form = document.querySelector('form');

    // Saat form dikirim, gabungkan jam
    form.addEventListener('submit', function () {
      const mulai = jamMulai.value;
      const selesai = jamSelesai.value;
      jamField.value = mulai && selesai ? `${mulai} - ${selesai}` : '';
    });
  });
  </script>
</body>
</html>