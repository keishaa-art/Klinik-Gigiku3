@extends('layouts.dokter-layout')

@section('konten')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold text-primary">Tambah Rekam Medis</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('dokter.rekam.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Pasien</label>
                    <select name="id_pasien" class="form-select" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                        @endforeach
                    </select>
                    @error('pasien_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Pemeriksaan</label>
                    <select name="id_pemeriksaan" class="form-select" required>
                        <option value="">-- Pilih Pemeriksaan --</option>
                        @foreach ($pemeriksaans as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} - Rp{{ number_format($p->harga, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                    @error('pemeriksaan_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Diagnosa</label>
                    <input type="text" name="diagnosis" class="form-control" value="{{ old('diagnosa') }}" required>
                    @error('diagnosa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tindakan</label>
                    <input type="text" name="tindakan" class="form-control" value="{{ old('tindakan') }}" required>
                    @error('tindakan')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pemeriksaan</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
       
                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('dokter.rekam.index') }}"
                        class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-[#C75E5E] hover:bg-[#a74b4b] text-white font-medium transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
