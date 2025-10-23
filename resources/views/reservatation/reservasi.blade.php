@extends('layouts.index')

@section('konten')  

<!-- HEADER -->
<div class="w-full bg-gradient-to-r from-[#FFE6E1] to-[#F0BAAF] shadow-md z-50 mt-[50px] p-8 min-h-[250px]">
    <h1 class="font-['Istok_Web'] font-semibold text-5xl mt-[40px] text-[#C04C4C]">Gigiku Dental Clinic</h1>
    <h2 class="font-['Istok_Web'] font-semibold text-[#C04C4C]">
        JL. Raden Kartini No.61/63
        <p>Kecamatan Kejaksan Kota Cirebon</p> 
        <p>Jawa Barat Indonesia</p> 
    </h2>
</div>

<!-- CONTENT -->
<div class="w-full max-w-5xl mx-auto p-8">

    <!-- Info Dokter -->
    <div class="bg-[#FFE6E1] text-[#C04C4C] rounded-xl p-6 shadow">
        <h1 class="text-2xl font-bold mb-4">Selesaikan Appointment</h1>

        <div class="bg-white rounded-xl p-4 flex items-center gap-6 border border-[#C04C4C]">
            <img src="https://via.placeholder.com/80" class="rounded-full border-2 border-[#C04C4C]" alt="Dokter">
            <div>
                <p class="font-bold text-[#C04C4C] text-lg">drg. Putu Eka Mery Utami Putri Sari</p>
                <p class="text-sm text-red-500">Dokter Gigi Umum | FDC Bali</p>
                <p class="text-sm">Kamis, 21 Agustus 2025</p>
                <p class="text-sm">15:30 - 16:00</p>
            </div>
        </div>
    </div>

    <!-- Tambahkan Rencana Perawatan -->
    <div class="mt-8">
        <h2 class="font-bold text-[#C04C4C] text-lg">Rencana Perawatan (Wajib Diisi)</h2>
        <div id="selected-treatments" class="mt-3 space-y-3"></div>
        
        <button 
            onclick="openPopup()" 
            class="mt-3 flex items-center gap-2 px-5 py-3 bg-[#FFE6E1] text-[#C04C4C] rounded-lg border border-[#C04C4C] hover:bg-[#C04C4C] hover:text-white transition">
            ➕ Tambahkan rencana perawatan
        </button>
    </div>

    <!-- Keluhan -->
    <div class="mt-8">
        <h2 class="font-bold text-[#C04C4C] text-lg">Tuliskan keluhan Anda (Opsional)</h2>
        <textarea class="w-full border border-[#C04C4C] rounded-lg p-3 mt-2 h-32" placeholder="Contohnya: Gigi saya berlubang dan gusi saya bengkak..."></textarea>
    </div>

    <button class="w-full md:w-1/3 bg-[#C04C4C] text-white p-3 rounded-lg mt-6 hover:opacity-90 block mx-auto">Selanjutnya</button>
</div>

<!-- POPUP -->
<div id="popup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-[600px] shadow-lg overflow-hidden">
        <div class="bg-[#C04C4C] text-white px-4 py-3 flex justify-between items-center">
            <h3 class="text-lg font-bold">Pilih Rencana Perawatan</h3>
            <button onclick="closePopup()" class="text-white text-xl font-bold">×</button>
        </div>

        <div class="p-4 space-y-3 max-h-96 overflow-y-auto">
            {{-- daftar dummy (contoh seperti dari CRUD pemeriksaan) --}}
            @php
                $treatments = [
                    [
                        'name' => 'Cabut Gigi Berlubang',
                        'detail' => 'Pencabutan gigi berlubang ringan tanpa komplikasi',
                        'price' => '250.000'
                    ],
                    [
                        'name' => 'Tambal Gigi Komposit',
                        'detail' => 'Penambalan estetika dengan bahan resin komposit',
                        'price' => '300.000'
                    ],
                    [
                        'name' => 'Scaling Gigi',
                        'detail' => 'Pembersihan karang gigi untuk semua gigi',
                        'price' => '150.000'
                    ],
                    [
                        'name' => 'Bleaching Gigi',
                        'detail' => 'Pemutihan gigi dengan bahan aman dan hasil cepat',
                        'price' => '999.000'
                    ],
                ];
            @endphp

            @foreach ($treatments as $item)
                <label class="flex items-start gap-3 border-b pb-3 cursor-pointer">
                    <input type="checkbox" 
                        class="w-5 h-5 mt-1 text-[#C04C4C]" 
                        data-name="{{ $item['name'] }}" 
                        data-detail="{{ $item['detail'] }}" 
                        data-price="{{ $item['price'] }}">
                    <div>
                        <p class="font-bold text-[#C04C4C]">{{ $item['name'] }}</p>
                        <p class="text-sm text-gray-600">{{ $item['detail'] }}</p>
                        <p class="text-sm font-semibold text-gray-800">Rp. {{ $item['price'] }}</p>
                    </div>
                </label>
            @endforeach
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
            const detail = cb.getAttribute('data-detail');
            const price = cb.getAttribute('data-price');

            const div = document.createElement('div');
            div.className = "flex flex-col md:flex-row md:items-center justify-between gap-3 border border-[#C04C4C] rounded-lg p-3 bg-white";
            div.innerHTML = `
                <div>
                    <p class="font-bold text-[#C04C4C]">${name}</p>
                    <p class="text-sm text-gray-600">${detail}</p>
                </div>
                <p class="text-sm font-semibold text-gray-800">Rp. ${price}</p>
            `;
            selectedContainer.appendChild(div);
        });

        closePopup();
    }
</script>

@endsection
