// edit doctor

@extends('layouts.admin-layout')

@section('konten')


<!-- Container -->
<div class="max-w-5xl mx-auto px-6 py-12">

    <!-- Card -->
    <div class="bg-[#F0BAAF] rounded-xl shadow-lg p-8">

        <h3 class="text-2xl font-semibold text-[#C04C4C] mb-6">Form Edit Dokter</h3>

        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- GRID FORM -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NAMA -->
                <div class="md:col-span-2">
                    <label class="text-[#C04C4C] font-semibold">Nama Dokter</label>
                    <input type="text" value="{{ $dokter->name }}" disabled
                        class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 cursor-not-allowed">
                    <input type="hidden" name="name" value="{{ $dokter->name }}">
                </div>

                <!-- EMAIL -->
                <div class="md:col-span-2">
                    <label class="text-[#C04C4C] font-semibold">Email</label>
                    <input type="email" value="{{ $dokter->user->email }}" disabled
                        class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 cursor-not-allowed">
                </div>

                <!-- CABANG -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">Cabang</label>
                    <select name="cabang_id" id="cabang_id" onchange="tampilkanAlamat()" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                        <option value="">-- Pilih Cabang --</option>
                        @foreach ($cabangs as $cabang)
                            <option value="{{ $cabang->id }}" 
                                data-alamat="{{ $cabang->alamat }}"
                                {{ $dokter->cabang_id == $cabang->id ? 'selected' : '' }}>
                                {{ $cabang->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- ALAMAT CABANG -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">Alamat Cabang</label>
                    <textarea id="alamat_cabang" readonly rows="3"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300">{{ $dokter->cabang->alamat }}</textarea>
                </div>

                <!-- NIP -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">NIP</label>
                    <input type="text" name="nip" value="{{ $dokter->nip }}" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- SPESIALIS -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">Spesialis</label>
                    <input type="text" name="spesialis" value="{{ $dokter->spesialis }}"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- TGL LAHIR -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="{{ $dokter->tgl_lahir }}"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- JK -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ $dokter->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $dokter->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- TELEPON -->
                <div>
                    <label class="text-[#C04C4C] font-semibold">No Telepon</label>
                    <input type="text" name="no_telepon" value="{{ $dokter->no_telepon }}"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- ALAMAT DOKTER -->
                <div class="md:col-span-2">
                    <label class="text-[#C04C4C] font-semibold">Alamat Dokter</label>
                    <textarea name="alamat" rows="3"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">{{ $dokter->alamat }}</textarea>
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="mt-8 flex gap-3">

                <button type="submit"
                    class="px-6 py-3 bg-[#C04C4C] text-white rounded-xl hover:bg-[#a93d3d] transition">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.dokter.index') }}"
                    class="px-6 py-3 bg-gray-400 text-white rounded-xl hover:opacity-80 transition">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

<script>
    function tampilkanAlamat() {
        let select = document.getElementById("cabang_id");
        let alamat = select.options[select.selectedIndex].getAttribute("data-alamat");
        document.getElementById("alamat_cabang").value = alamat ?? "";
    }
</script>

@endsection
