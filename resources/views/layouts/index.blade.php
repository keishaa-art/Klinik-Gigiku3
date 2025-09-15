<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Klinik Gigiku</title>
  {{-- <link rel="icon" href="public/storage/image1.png" /> --}}
  <link rel="icon" href="{{ asset('storage/huntu.png') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="script.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
  <script src="/tailwindConfig.js"></script>

</head>
<body class="font-sans">



  <nav class="fixed top-0 w-full bg-gradient-to-r from-[#FFE6E1] to-[#F0BAAF] shadow-md z-50">
    <div class="max-w-[1200px] mx-auto px-4 py-3 flex items-center justify-between">
      <img src="{{ asset('storage/image1.png') }}" alt="Logo" class="h-10" />

      <button id="menuToggle" class="md:hidden text-[#C04C4C] focus:outline-none text-2xl">
        ☰
      </button>

      <div id="navLinks" class="hidden md:flex md:items-center md:space-x-8">
        <a href="/" class="text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">Home</a>
        <a href="#" class="text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">About</a>
        <a href="reservasi" class="text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">Reservasi</a>
        <a href="#" class="text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">Navigasi</a>
        <button id="loginBtn" class="ml-4 bg-white text-[#C04C4C] font-semibold px-4 py-1 rounded-lg shadow hover:bg-[#FFE6E1] transition">
          Login
        </button>
        <img id="profilePic" src="https://i.pravatar.cc/30" alt="Profile" class="hidden w-8 h-8 rounded-full cursor-pointer ml-4" />
      </div>
    </div>

    <div id="mobileMenu" class="md:hidden hidden px-4 pb-4 space-y-3">
      <a href="/" class="block text-[#C04C4C] font-semibold">Home</a>
      <a href="#" class="block text-[#C04C4C] font-semibold">About</a>
      <a href="resevasi" class="block text-[#C04C4C] font-semibold">Reservasi</a>
      <a href="#" class="block text-[#C04C4C] font-semibold">Navigasi</a>
      <button id="mobileLoginBtn" class="w-full bg-white text-[#C04C4C] font-semibold py-1 rounded-lg shadow hover:bg-[#FFE6E1] transition">
        Login
      </button>
      <div id="mobileProfile" class="hidden">
        <img src="https://i.pravatar.cc/30" alt="Profile" class="w-8 h-8 rounded-full" />
      </div>
    </div>
  </nav>



    @yield('konten')

    <!-- Footer -->
    <footer class="bg-T1 text-white text-center py-4">
        <p>&copy; 2025 by <span class="font-bold"> Gigiku Dental Clinic </span></p>
    </footer>

</body>

</html>