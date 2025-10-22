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
                    <select name="pasien_id" class="form-select" required>
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
                    <select name="pemeriksaan_id" class="form-select" required>
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
                    <input type="text" name="diagnosa" class="form-control" value="{{ old('diagnosa') }}" required>
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

                <div class="text-end">
                    <a href="{{ route('dokter.rekam.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
