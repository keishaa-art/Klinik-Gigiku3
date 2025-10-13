<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Farmasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen">
    
    <aside class="w-64 bg-[#F0BAAF] flex flex-col">
  <div class="flex items-center justify-center gap-3 p-6 text-2xl font-bold border-b text-[#C75E5E] border-red-200">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14" />
    <p>GIGIKU</p>
  </div>
      
      <nav class="flex-1 p-4 space-y-3 text-[#A85050]">
        
        <!-- Home -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-rose-300 transition">
          <i class="bi bi-house-door-fill text-lg"></i>
          Home
        </a>

       
        

        <!-- Dokter -->
        <a href="{{ route('farmasi.obat.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-rose-300 transition {{ request()->routeIs('admin.dokter.*') ? 'bg-rose-200' : '' }}">
          <i class="bi bi-heart-pulse-fill text-lg"></i>
          Data Obat
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