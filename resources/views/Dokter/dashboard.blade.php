<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Dokter - Klinik Gigiku</title>
    <link rel="icon" href="{{ asset('storage/huntu.png') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="js/tailwindconfig.js"></script>
</head>

<body class="font-sans bg-white">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-[#FFE6E1] to-[#F0BAAF] shadow-md transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">
        <div class="flex flex-col h-full">
            <!-- Profil Dokter -->
            <div class="flex flex-col items-center py-4 border-b border-[#C04C4C]/30">
                <img src="https://i.pravatar.cc/80" alt="Profile"
                    class="w-20 h-20 rounded-full border-4 border-white shadow-md">
                <span class="mt-2 text-[#C04C4C] font-semibold">drg. Andini</span>
            </div>
            <!-- Menu -->
            <nav class="flex-1 px-4 space-y-4 mt-4">
                <a href="/" class="block text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">Home</a>
                <a href="#" class="block text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">About</a>
                <a href="reservasi"
                    class="block text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">Reservasi</a>
                <a href="#"
                    class="block text-[#C04C4C] font-semibold hover:text-[#a93d3d] transition">Navigasi</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full bg-white text-[#C04C4C] font-semibold px-4 py-1 rounded-lg shadow hover:bg-[#FFE6E1] transition text-center">
                        Logout
                    </button>
                </form>

            </nav>
        </div>
    </aside>

    <!-- Tombol Toggle (Mobile) -->
    <button id="menuToggle" class="md:hidden fixed top-4 left-4 bg-[#C04C4C] text-white p-2 rounded-lg z-50">
        ☰
    </button>

    <!-- Konten -->
    <main class="md:ml-64 p-6 pt-16 pb-20"> <!-- Tambah pb-20 agar tidak ketutupan footer -->
        <h1 class="text-3xl font-bold text-[#C04C4C] mb-6">Dashboard Dokter</h1>

        <!-- Tabs -->
        <div class="flex gap-4 mb-6 flex-wrap">
            <button onclick="showTab('jadwal')"
                class="tab-btn bg-[#FFE6E1] text-[#C04C4C] px-4 py-2 rounded shadow hover:bg-[#F0BAAF]">Jadwal
                Reservasi</button>
            <button onclick="showTab('profil')"
                class="tab-btn bg-[#FFE6E1] text-[#C04C4C] px-4 py-2 rounded shadow hover:bg-[#F0BAAF]">Profil
                Dokter</button>
            <button onclick="showTab('riwayat')"
                class="tab-btn bg-[#FFE6E1] text-[#C04C4C] px-4 py-2 rounded shadow hover:bg-[#F0BAAF]">Riwayat
                Pemeriksaan</button>
        </div>

        <!-- Jadwal Reservasi -->
        <div id="jadwal" class="tab-content">
            <div class="bg-[#FFE6E1] shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold text-[#C04C4C] mb-4">Jadwal Reservasi</h2>
                <table class="w-full text-left border">
                    <thead>
                        <tr class="bg-[#F0BAAF] text-white">
                            <th class="p-2">Nama Pasien</th>
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Jam</th>
                            <th class="p-2">Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="p-2">Putri Lestari</td>
                            <td class="p-2">10 Agustus 2025</td>
                            <td class="p-2">10:00 WIB</td>
                            <td class="p-2">Pembersihan Gigi</td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-2">Rizky Pratama</td>
                            <td class="p-2">10 Agustus 2025</td>
                            <td class="p-2">11:00 WIB</td>
                            <td class="p-2">Tambal Gigi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Profil Dokter -->
        <div id="profil" class="tab-content hidden">
            <div class="bg-[#FFE6E1] shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold text-[#C04C4C] mb-4">Profil Dokter</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p><strong>Nama:</strong> drg. Andini Wulandari</p>
                        <p><strong>Email:</strong> andini@example.com</p>
                        <p><strong>Nomor HP:</strong> 08123456789</p>
                    </div>
                    <div>
                        <p><strong>Spesialis:</strong> Konservasi Gigi</p>
                        <p><strong>Pengalaman:</strong> 5 tahun</p>
                        <p><strong>Cabang:</strong> Klinik Gigiku - Sudirman</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Pemeriksaan -->
        <div id="riwayat" class="tab-content hidden">
            <div class="bg-[#FFE6E1] shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold text-[#C04C4C] mb-4">Riwayat Pemeriksaan</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li>08 Agustus 2025 - Rina Ayu - Scaling</li>
                    <li>06 Agustus 2025 - Dedi Saputra - Pencabutan Gigi</li>
                    <li>05 Agustus 2025 - Maya Sari - Konsultasi</li>
                </ul>
            </div>
        </div>
    </main>

    <!-- Footer (fixed di bawah) -->
    <footer class="fixed bottom-0 left-0 w-full md:ml-64 bg-[#C04C4C] text-white text-center py-4">
        <p>&copy; 2025 by <span class="font-bold"> Gigiku Dental Clinic </span></p>
    </footer>

    <!-- Script -->
    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            document.getElementById(tabId).classList.remove('hidden');
        }
        document.addEventListener('DOMContentLoaded', () => showTab('jadwal'));

        // Toggle Sidebar Mobile
        document.getElementById('menuToggle').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
