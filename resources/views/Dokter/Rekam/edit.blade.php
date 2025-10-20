@extends('layouts.admin-layout')

@section('konten')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold text-warning">Edit Rekam Medis</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('dokter.rekam.update', $rekam->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Pasien</label>
                    <select name="pasien_id" class="form-select" disabled>
                        <option value="{{ $rekam->pasien->id }}">{{ $rekam->pasien->name }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pemeriksaan</label>
                    <select name="pemeriksaan_id" class="form-select">
                        @foreach ($pemeriksaans as $p)
                            <option value="{{ $p->id }}" {{ $rekam->pemeriksaan_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }} - Rp{{ number_format($p->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Diagnosa</label>
                    <input type="text" name="diagnosa" class="form-control" value="{{ $rekam->diagnosa }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tindakan</label>
                    <input type="text" name="tindakan" class="form-control" value="{{ $rekam->tindakan }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pemeriksaan</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $rekam->tanggal }}" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('dokter.rekam.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
