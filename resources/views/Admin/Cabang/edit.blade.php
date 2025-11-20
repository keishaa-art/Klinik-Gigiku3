
@extends('layouts.admin-layout')

@section('konten')

<div class="w-full bg-white p-8 rounded-2xl shadow-lg">

    <!-- Judul -->
    <h4 class="text-2xl font-bold text-[#C75E5E] text-center mb-6">
        Edit Data Cabang
    </h4>

    <!-- Form Edit -->
    <form action="{{ route('admin.cabang.update', $cabang->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Input Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="nama" id="nama"
                    value="{{ $cabang->nama }}"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 
                    focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
                    required>
            </div>

            <!-- Input Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    value="{{ $cabang->alamat }}"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 
                    focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
                    required>
            </div>

        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('admin.cabang.index') }}"
                class="px-5 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 text-white font-medium transition">
                Kembali
            </a>

            <button type="submit"
                class="px-5 py-2 rounded-lg bg-[#C75E5E] hover:bg-[#a74b4b] text-white font-medium transition">
                Update
            </button>
        </div>
    </form>

</div>

@endsection
