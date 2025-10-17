@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nota Reservasi</h2>

    <div class="card p-3">
        <p><strong>Cabang:</strong> {{ $reservasi->cabang->nama_cabang }}</p>
        <p><strong>Dokter:</strong> {{ $reservasi->dokter->name }}</p>
        <p><strong>Tanggal:</strong> {{ $reservasi->tanggal }}</p>
        <p><strong>Jam:</strong> {{ $reservasi->jam }}</p>
        <p><strong>Pemeriksaan:</strong> {{ $reservasi->pemeriksaan->nama_pemeriksaan }}</p>
        <p><strong>Biaya Reservasi:</strong> Rp{{ number_format($reservasi->biaya_reservasi) }}</p>
        <p><strong>Total:</strong> Rp{{ number_format($reservasi->total) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($reservasi->status) }}</p>
    </div>

    <a href="{{ route('reservasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
