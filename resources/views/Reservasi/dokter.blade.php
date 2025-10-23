@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Pilih Dokter - {{ $cabang->nama }}</h4>
                    <small class="text-muted">Step 2 of 4</small>
                </div>
                <div class="card-body">
                    @if($dokters->count() > 0)
                    <form action="{{ route('pasien.reservasi.jadwal') }}" method="POST">
                        @csrf
                        <div class="row">
                            @foreach($dokters as $dokter)
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Dr. {{ $dokter->name }}</h5>
                                        <p class="card-text text-muted">{{ $dokter->spesialis ?? 'Umum' }}</p>
                                        <button type="submit" name="dokter_id" value="{{ $dokter->id }}" 
                                                class="btn btn-primary btn-sm">
                                            Pilih Dokter Ini
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                    @else
                    <div class="text-center py-4">
                        <p class="text-muted">Tidak ada dokter di cabang ini</p>
                        <a href="{{ route('pasien.reservasi.cabang') }}" class="btn btn-secondary">
                            Kembali ke Pilih Cabang
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection