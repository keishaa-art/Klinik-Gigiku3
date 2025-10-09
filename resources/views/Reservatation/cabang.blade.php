  @extends('layouts.navigation-layout')

    @section('konten')
    
     <!-- content -->
  <div class="w-full bg-gradient-to-r from-[#FFE6E1] to-[#F0BAAF] shadow-md z-50 mt-[50px] p-8 min-h-[250px] background-color-[#F0BAAF]">
    <h1 class=" font-['Istok_Web'] font-semibold text-5xl mt-[40px] text-[#C04C4C] ">Gigiku Dental Clinic</h1>
    <h2 class="font-['Istok_Web'] font-semibold text-[#C04C4C]">
  </div>

    <div class="w-full mt-[2px] p-8">
      <h1 class="font-['Istok_Web'] font-semibold text-[#C04C4C] text-2xl">Pilih Cabang : </h1>
  </div>

  <div class="max-w-7xl mx-auto px-4 py-4">
  <div class="flex flex-col items-center gap-6">
    
    <!-- Card 1 -->
    <div class="cabang-card bg-[#F0BAAF] rounded-xl shadow-lg p-4 flex items-center w-[600px] h-36 transition ease-in-out duration-500 transform hover:scale-105">
      <img src="https://i.pravatar.cc/150?img=3" 
           alt="foto cabang" 
           class="w-24 h-24 rounded-xl mr-4 ml-2">
      <div class="flex flex-col justify-center">
        <h3 class="text-[#C04C4C] font-semibold text-lg">GIGIKU Cabang Cikarang</h3>
        <p class="text-gray-500 text-sm">...</p>
        <p class="text-gray-500 text-sm">Jl. Cendrawasih No. 45, Cirebon</p>
        <button onclick="pilihCabang(this)" 
                class="mt-2 px-4 py-1 bg-[#C04C4C] text-white text-sm rounded hover:bg-[#a93d3d] w-fit">
          Pilih
        </button>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="cabang-card bg-[#F0BAAF] rounded-xl shadow-lg p-4 flex items-center w-[600px] h-36 transition ease-in-out duration-500 transform hover:scale-105">
      <img src="https://i.pravatar.cc/150?img=4" 
           alt="foto cabang" 
           class="w-24 h-24 rounded-xl mr-4 ml-2">
      <div class="flex flex-col justify-center">
        <h3 class="text-[#C04C4C] font-semibold text-lg">GIGIKU Cabang Bandung</h3>
        <p class="text-gray-500 text-sm">...</p>
        <p class="text-gray-500 text-sm">Jl. Merdeka No. 10, Bandung</p>
        <button onclick="pilihCabang(this)" 
                class="mt-2 px-4 py-1 bg-[#C04C4C] text-white text-sm rounded hover:bg-[#a93d3d] w-fit">
          Pilih
        </button>
      </div>
    </div>

    <div class="cabang-card bg-[#F0BAAF] rounded-xl shadow-lg p-4 flex items-center w-[600px] h-36 transition ease-in-out duration-500 transform hover:scale-105">
      <img src="https://i.pravatar.cc/150?img=4" 
           alt="foto cabang" 
           class="w-24 h-24 rounded-xl mr-4 ml-2">
      <div class="flex flex-col justify-center">
        <h3 class="text-[#C04C4C] font-semibold text-lg">GIGIKU Cabang CIrebon</h3>
        <p class="text-gray-500 text-sm">...</p>
        <p class="text-gray-500 text-sm">Jl. Merdeka No. 10, cirebon</p>
        <button onclick="pilihCabang(this)" 
                class="mt-2 px-4 py-1 bg-[#C04C4C] text-white text-sm rounded hover:bg-[#a93d3d] w-fit">
          Pilih
        </button>
      </div>
    </div>

    <div class="mt-8 flex justify-center">
    <a href="1" id="btn-selanjutnya" class="w-[320px] mb-8 px-6 py-3 rounded-xl bg-gray-400 text-white text-lg text-center transition hover:opacity-80 cursor-not-allowed pointer-events-none">
    Selanjutnya
    </a>
</div>

  </div>
</div>

<script>

function pilihCabang(button) {
  // Reset semua kartu ke warna default
  document.querySelectorAll('.cabang-card').forEach(card => {
    card.classList.remove('bg-green-200');
    card.classList.add('bg-[#F0BAAF]');
  });

  // Ubah kartu yang dipilih
  const card = button.closest('.cabang-card');
  card.classList.remove('bg-[#F0BAAF]');
  card.classList.add('bg-green-200');

  // Aktifkan tombol selanjutnya
  const btn = document.getElementById('btn-selanjutnya');
  btn.classList.remove('bg-gray-400', 'cursor-not-allowed', 'pointer-events-none');
  btn.classList.add('bg-[#C04C4C]', 'cursor-pointer');
}

</script>

@endsection