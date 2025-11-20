//cfreate blade php

<!-- Container -->
<div class="max-w-5xl mx-auto px-6 py-12">

    <!-- Form Card -->
    <div class="bg-[#F0BAAF] rounded-xl shadow-lg p-8">

        <h3 class="text-2xl font-semibold text-[#C04C4C] mb-6">Form Tambah Dokter</h3>

        <form action="{{ route('admin.dokter.store') }}" method="POST">
            @csrf

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- User -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">Pilih Akun Dokter</label>
                    <select name="user_id" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                        <option value="">-- Pilih Akun User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">Nama Dokter</label>
                    <input type="text" name="name" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- NIP -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">NIP</label>
                    <input type="text" name="nip" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- Spesialis -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">Spesialis</label>
                    <input type="text" name="spesialis"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- No Telepon -->
                <div>
                    <label class="block font-semibold text-[#C04C4C] mb-1">No Telepon</label>
                    <input type="text" name="no_telepon"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label class="block font-semibold text-[#C04C4C] mb-1">Alamat</label>
                    <textarea name="alamat" rows="3"
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]"></textarea>
                </div>

                <!-- Cabang -->
                <div class="md:col-span-2">
                    <label class="block font-semibold text-[#C04C4C] mb-1">Cabang</label>
                    <select name="cabang_id" required
                        class="w-full p-3 rounded-lg bg-white border border-gray-300 focus:ring-[#C04C4C] focus:border-[#C04C4C]">
                        <option value="">-- Pilih Cabang --</option>
                        @foreach ($cabangs as $cabang)
                            <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }} - {{ $cabang->alamat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-8 flex gap-3">

                <!-- Button Simpan -->
                <button type="submit"
                    class="px-6 py-3 bg-[#C04C4C] text-white rounded-xl hover:bg-[#a93d3d] transition">
                    Simpan
                </button>

                <!-- Kembali -->
                <a href="{{ route('admin.dokter.index') }}"
                    class="px-6 py-3 bg-gray-400 text-white rounded-xl hover:opacity-80 transition">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
