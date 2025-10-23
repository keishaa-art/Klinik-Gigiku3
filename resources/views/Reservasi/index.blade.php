<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Reservasi Saya</h2>
        <a href="{{ route('pasien.reservasi.create') }}" class="btn btn-primary">
            Buat Reservasi Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($reservasis->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Dokter</th>
                                <th>Cabang</th>
                                <th>Pemeriksaan</th>
                                <th>Total Biaya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasis as $reservasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $reservasi->tanggal }}</td>
                                <td>{{ $reservasi->jam }}</td>
                                <td>Dr. {{ $reservasi->dokter->name }}</td>
                                <td>{{ $reservasi->cabang->nama }}</td>
                                <td>{{ $reservasi->pemeriksaan->nama_pemeriksaan }}</td>
                                <td>Rp {{ number_format($reservasi->total, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge 
                                        @if($reservasi->status == 'pending') bg-warning
                                        @elseif($reservasi->status == 'confirmed') bg-success
                                        @elseif($reservasi->status == 'selesai') bg-info
                                        @else bg-danger @endif">
                                        {{ ucfirst($reservasi->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('pasien.reservasi.show', $reservasi->id) }}" 
                                       class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4">
                    <p class="text-muted">Belum ada reservasi</p>
                    <a href="{{ route('pasien.reservasi.create') }}" class="btn btn-primary">
                        Buat Reservasi Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
