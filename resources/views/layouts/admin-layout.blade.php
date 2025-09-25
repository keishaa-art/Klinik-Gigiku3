<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-[#F0BAAF] flex flex-col">
      <div class="p-6 text-2xl font-bold border-b text-[#C75E5E] border-red-200">GIGIKU</div>
      
      <nav class="flex-1 p-4 space-y-3 text-[#A85050]">
        
        <!-- Home -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-rose-300 transition">
          <i class="bi bi-house-door-fill text-lg"></i>
          Home
        </a>

        <!-- Dropdown Admin -->
        <div>
          <button onclick="toggleSubMenu()" 
                  class="w-full flex justify-between items-center px-3 py-2 rounded-lg hover:bg-red-300 transition">
              <span class="flex items-center gap-2">
                <i class="bi bi-gear-fill text-lg"></i>
                Admin
              </span>
              <i id="arrowIcon" class="bi bi-chevron-down text-sm transition-transform"></i>
          </button>

          <!-- Sub menu -->
          <div id="subMenu" class="hidden ml-6 mt-2 space-y-2">
              <a href="{{ route('admin.pemeriksaan.index') }}" 
                 class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-red-100">
                <i class="bi bi-clipboard-check-fill text-lg"></i>
                Pemeriksaan
              </a>
              <a href="{{ route('admin.cabang.index') }}" 
                 class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-red-100">
                <i class="bi bi-building-fill text-lg"></i>
                Cabang
              </a>
          </div>
        </div>

        <!-- Dokter -->
        <a href="{{ route('admin.dokter.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-rose-300 transition {{ request()->routeIs('admin.dokter.*') ? 'bg-rose-200' : '' }}">
          <i class="bi bi-heart-pulse-fill text-lg"></i>
          Dokter
        </a>

        <!-- Pasien -->
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-rose-300 transition">
          <i class="bi bi-people-fill text-lg"></i>
          Pasien
        </a>

        <!-- Farmasi -->
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-rose-300 transition">
          <i class="bi bi-capsule-pill text-lg"></i>
          Farmasi
        </a>
      </nav>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="p-4 border-t border-red-200">
          <button class="w-full flex items-center justify-center gap-2 py-2 text-white bg-red-500 hover:bg-red-600 rounded" type="submit">
            <i class="bi bi-box-arrow-right text-lg"></i>
            Logout
          </button>
        </div>
      </form>
    </aside>

    <!-- Konten utama -->
    <main class="flex-1 p-6 overflow-auto">
      @yield('konten')
    </main>
  </div>

  <script>
    function toggleSubMenu() {
        let menu = document.getElementById("subMenu");
        let arrow = document.getElementById("arrowIcon");
        menu.classList.toggle("hidden");
        arrow.classList.toggle("rotate-180");
    }
  </script>
</body>
</html>