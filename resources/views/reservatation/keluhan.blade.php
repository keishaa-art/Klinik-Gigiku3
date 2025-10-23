@extends('layouts.index')

@section('konten')  

 <!-- content -->
  <div class="w-full bg-gradient-to-r from-[#FFE6E1] to-[#F0BAAF] shadow-md z-50 mt-[50px] p-8 min-h-[250px] background-color-[#F0BAAF]">
    <h1 class=" font-['Istok_Web'] font-semibold text-5xl mt-[40px] text-[#C04C4C] ">Gigiku Dental Clinic</h1>
    <h2 class="font-['Istok_Web'] font-semibold text-[#C04C4C]">JL. raden Kartini No.61/63
        <p>Kecamatan Kejaksan Kota Cirebon</p> 
        <p>Jawa Barat Indonesia</p> 
  </div>

<div class="max-w-lg mx-auto p-4">

    <!-- Info Dokter -->
    <div class="bg-[#FFE6E1] text-[#C04C4C] rounded-xl p-4 shadow">
        <h1 class="text-xl font-bold">Selesaikan Appointment</h1>

        <div class="bg-white rounded-xl p-4 mt-4 flex items-center gap-4 border border-[#C04C4C]">
            <img src="https://via.placeholder.com/60" class="rounded-full" alt="Dokter">
            <div>
                <p class="font-bold text-[#C04C4C]">drg. Putu Eka Mery Utami Putri Sari</p>
                <p class="text-sm text-red-500">Dokter Gigi Umum | FDC Bali</p>
                <p class="text-sm">Kamis, 21 Agustus 2025</p>
                <p class="text-sm">15:30 - 16:00</p>
            </div>
        </div>
    </div>

    <!-- Tambahkan Rencana Perawatan -->
    <div class="mt-6">
        <h2 class="font-bold text-[#C04C4C]">Rencana Perawatan (Wajib Diisi)</h2>
        <div id="selected-treatments" class="mt-3 space-y-2"></div>
        
        <button 
            onclick="openPopup()" 
            class="mt-2 flex items-center gap-2 px-4 py-2 bg-[#FFE6E1] text-[#C04C4C] rounded-lg border border-[#C04C4C] hover:bg-[#C04C4C] hover:text-white transition">
            ➕ Tambahkan rencana perawatan
        </button>
    </div>

    <!-- Keluhan -->
    <div class="mt-4">
        <h2 class="font-bold text-[#C04C4C]">Tuliskan keluhan Anda (Opsional)</h2>
        <textarea class="w-full border border-[#C04C4C] rounded-lg p-2 mt-2" placeholder="Contohnya: Gigi saya berlubang dan gusi saya bengkak..."></textarea>
    </div>

    <button class="w-full bg-[#C04C4C] text-white p-3 rounded-lg mt-4 hover:opacity-90">Selanjutnya</button>
</div>

<!-- POPUP -->
<div id="popup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-[500px] shadow-lg overflow-hidden">
        <div class="bg-[#C04C4C] text-white px-4 py-3">
            <h3 class="text-lg font-bold">Pilih Rencana Perawatan</h3>
        </div>
        <div class="p-4 space-y-3 max-h-96 overflow-y-auto">
            @php
                $treatments = [
                    ['name' => '6 in 1 Signature Scaling All Grade', 'price' => '149.000', 'image' => 'scaling.jpg'],
                    ['name' => 'Basic Behel Metal', 'price' => '1.999.000', 'image' => 'behel-metal.jpg'],
                    ['name' => 'Behel Smart Self Ligating', 'price' => '5.499.000', 'image' => 'behel-smart.jpg'],
                    ['name' => 'Bleaching Purewhite 999K', 'price' => '999.000', 'image' => 'bleaching.jpg'],
                    ['name' => 'Kontrol Ortho Damon/Premium Self Ligating', 'price' => '465.000', 'image' => 'kontrol-ortho.jpg']
                ];
            @endphp

            {{-- @foreach ($treatments as $index => $item)
                <label class="flex items-center gap-3 border-b pb-2 cursor-pointer">
                    <input type="checkbox" class="w-5 h-5 text-[#C04C4C]" 
                           data-name="{{ $item['name'] }}" 
                           data-price="{{ $item['price'] }}" 
                           data-image="{{ $item['image'] }}">
                    <div>
                        <p class="font-bold text-[#C04C4C]">{{ $item['name'] }}</p>
                        <p class="text-sm text-gray-600">Rp. {{ $item['price'] }}</p>
                    </div>
                </label>
            @endforeach --}}
        </div>
        <div class="flex justify-end p-4 border-t">
            <button onclick="applySelection()" class="bg-[#C04C4C] text-white px-4 py-2 rounded-lg hover:opacity-90">Selesai</button>
        </div>
    </div>
</div>

<script>
    function openPopup() {
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }

    function applySelection() {
        const selectedContainer = document.getElementById('selected-treatments');
        selectedContainer.innerHTML = ''; // hapus isi lama

        const checkboxes = document.querySelectorAll('#popup input[type="checkbox"]:checked');
        checkboxes.forEach(cb => {
            const name = cb.getAttribute('data-name');
            const price = cb.getAttribute('data-price');
            const image = cb.getAttribute('data-image');

            // bikin elemen card perawatan
            const div = document.createElement('div');
            div.className = "flex items-center gap-3 border border-[#C04C4C] rounded-lg p-2";
            div.innerHTML = `
                <img src="/images/${image}" alt="${name}" class="w-16 h-16 rounded-lg object-cover border border-[#C04C4C]">
                <div>
                    <p class="font-bold text-[#C04C4C]">${name}</p>
                    <p class="text-sm text-gray-600">Rp. ${price}</p>
                </div>
            `;
            selectedContainer.appendChild(div);
        });

        closePopup();
    }
</script>
@endsection

