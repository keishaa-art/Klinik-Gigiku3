@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Reservasi Saya</h2>

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Jika belum ada reservasi --}}
    @if ($reservasis->isEmpty())
        <div class="alert alert-info">
            Belum ada reservasi yang dibuat.
        </div>
        <a href="{{ route('pasien.reservasi.create') }}" class="btn btn-primary">
            + Buat Reservasi Baru
        </a>
    @else
        <div class="mb-3 text-end">
            <a href="{{ route('pasien.reservasi.create') }}" class="btn btn-primary">
                + Buat Reservasi Baru
            </a>
        </div>

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Cabang</th>
                    <th>Dokter</th>
                    <th>Pemeriksaan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasis as $index => $r)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $r->cabang->nama_cabang ?? '-' }}</td>
                        <td>{{ $r->dokter->name ?? '-' }}</td>
                        <td>{{ $r->pemeriksaan->nama_pemeriksaan ?? '-' }}</td>
                        <td>{{ $r->tanggal }}</td>
                        <td>{{ $r->jam }}</td>
                        <td>
                            <span class="badge 
                                @if($r->status == 'pending') bg-warning
                                @elseif($r->status == 'selesai') bg-success
                                @else bg-secondary @endif">
                                {{ ucfirst($r->status) }}
                            </span>
                        </td>
                        <td>Rp{{ number_format($r->total) }}</td>
                        <td>
                            <a href="{{ route('pasien.reservasi.show', $r->id) }}" class="btn btn-sm btn-info">
                                Lihat
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
