@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Ringkasan Reservasi</h4>
                    <small>Step 4 of 4 - Tinjau dan lengkapi reservasi Anda</small>
                </div>
                <div class="card-body">
                    <!-- Ringkasan Data -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Detail Reservasi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Cabang:</strong> {{ session('reservasi.cabang_nama') }}</p>
                                    <p><strong>Dokter:</strong> Dr. {{ session('reservasi.dokter_nama') }}</p>
                                    @if(session('reservasi.dokter_spesialis'))
                                    <p><strong>Spesialis:</strong> {{ session('reservasi.dokter_spesialis') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse(session('reservasi.tanggal'))->format('d F Y') }}</p>
                                    <p><strong>Jam:</strong> {{ session('reservasi.jam') }}</p>
                                    <p><strong>Hari:</strong> {{ \Carbon\Carbon::parse(session('reservasi.tanggal'))->translatedFormat('l') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Pemeriksaan & Keluhan -->
                    <form action="{{ route('pasien.reservasi.store') }}" method="POST" id="reservasiForm">
                        @csrf
                        
                        <!-- Pemeriksaan (akan diisi via popup) -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Pemeriksaan</h5>
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pemeriksaanModal">
                                    + Pilih Pemeriksaan
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="selectedPemeriksaan">
                                    <p class="text-muted mb-0">Belum ada pemeriksaan dipilih</p>
                                </div>
                                <input type="hidden" name="pemeriksaan_id" id="pemeriksaanId">
                                <input type="hidden" name="pemeriksaan_nama" id="pemeriksaanNama">
                                <input type="hidden" name="pemeriksaan_harga" id="pemeriksaanHarga">
                            </div>
                        </div>

                        <!-- Keluhan -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Keluhan</h5>
                            </div>
                            <div class="card-body">
                                <textarea name="keluhan" class="form-control" rows="4" 
                                          placeholder="Deskripsikan keluhan atau gejala yang Anda alami..."></textarea>
                                <small class="text-muted">Opsional: Jelaskan keluhan Anda untuk membantu dokter memahami kondisi Anda</small>
                            </div>
                        </div>

                        <!-- Ringkasan Biaya -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Ringkasan Biaya</h5>
                            </div>
                            <div class="card-body">
                                <div id="biayaSummary">
                                    <p class="text-muted mb-0">Pilih pemeriksaan terlebih dahulu</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pasien.reservasi.jadwal') }}" class="btn btn-secondary">
                                ← Kembali
                            </a>
                            <button type="submit" class="btn btn-success btn-lg" id="submitBtn" disabled>
                                Buat Reservasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Popup Pemeriksaan -->
<div class="modal fade" id="pemeriksaanModal" tabindex="-1" aria-labelledby="pemeriksaanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pemeriksaanModalLabel">Pilih Pemeriksaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($pemeriksaans as $pemeriksaan)
                    <div class="col-md-6 mb-3">
                        <div class="card h-100 pemeriksaan-card" 
                             data-id="{{ $pemeriksaan->id }}"
                             data-nama="{{ $pemeriksaan->nama_pemeriksaan }}"
                             data-harga="{{ $pemeriksaan->harga }}"
                             data-deskripsi="{{ $pemeriksaan->deskripsi }}">
                            <div class="card-body">
                                <h6 class="card-title">{{ $pemeriksaan->nama_pemeriksaan }}</h6>
                                <p class="card-text small text-muted">{{ $pemeriksaan->deskripsi }}</p>
                                <p class="card-text">
                                    <strong class="text-primary">Rp {{ number_format($pemeriksaan->harga, 0, ',', '.') }}</strong>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button type="button" class="btn btn-outline-primary btn-sm w-100 pilih-pemeriksaan">
                                    Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($pemeriksaans->isEmpty())
                <div class="text-center py-4">
                    <p class="text-muted">Tidak ada pemeriksaan tersedia</p>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
.pemeriksaan-card {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.pemeriksaan-card:hover {
    border-color: #007bff;
    transform: translateY(-2px);
}

.pemeriksaan-card.selected {
    border-color: #28a745;
    background-color: #f8fff9;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pemeriksaanCards = document.querySelectorAll('.pemeriksaan-card');
    const pilihButtons = document.querySelectorAll('.pilih-pemeriksaan');
    const selectedPemeriksaanDiv = document.getElementById('selectedPemeriksaan');
    const pemeriksaanIdInput = document.getElementById('pemeriksaanId');
    const pemeriksaanNamaInput = document.getElementById('pemeriksaanNama');
    const pemeriksaanHargaInput = document.getElementById('pemeriksaanHarga');
    const biayaSummaryDiv = document.getElementById('biayaSummary');
    const submitBtn = document.getElementById('submitBtn');
    const pemeriksaanModal = new bootstrap.Modal(document.getElementById('pemeriksaanModal'));

    // Event untuk card pemeriksaan
    pemeriksaanCards.forEach(card => {
        card.addEventListener('click', function() {
            // Hapus selected class dari semua card
            pemeriksaanCards.forEach(c => c.classList.remove('selected'));
            
            // Tambah selected class ke card yang dipilih
            this.classList.add('selected');
        });
    });

    // Event untuk tombol pilih
    pilihButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const card = this.closest('.pemeriksaan-card');
            selectPemeriksaan(card);
            pemeriksaanModal.hide();
        });
    });

    function selectPemeriksaan(card) {
        const id = card.dataset.id;
        const nama = card.dataset.nama;
        const harga = card.dataset.harga;
        const deskripsi = card.dataset.deskripsi;

        // Update input hidden
        pemeriksaanIdInput.value = id;
        pemeriksaanNamaInput.value = nama;
        pemeriksaanHargaInput.value = harga;

        // Update tampilan pemeriksaan terpilih
        selectedPemeriksaanDiv.innerHTML = `
            <div class="alert alert-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${nama}</strong>
                        <br><small class="text-muted">${deskripsi}</small>
                    </div>
                    <div class="text-end">
                        <strong>Rp ${parseInt(harga).toLocaleString('id-ID')}</strong>
                        <br><button type="button" class="btn btn-outline-secondary btn-sm mt-1" onclick="ubahPemeriksaan()">
                            Ubah
                        </button>
                    </div>
                </div>
            </div>
        `;

        // Update ringkasan biaya
        updateBiayaSummary(harga);
        
        // Enable submit button
        submitBtn.disabled = false;
    }

    function updateBiayaSummary(hargaPemeriksaan) {
        const biayaReservasi = 50000;
        const total = parseInt(hargaPemeriksaan) + biayaReservasi;

        biayaSummaryDiv.innerHTML = `
            <div class="row">
                <div class="col-6">Biaya Pemeriksaan:</div>
                <div class="col-6 text-end">Rp ${parseInt(hargaPemeriksaan).toLocaleString('id-ID')}</div>
                <div class="col-6">Biaya Reservasi:</div>
                <div class="col-6 text-end">Rp ${biayaReservasi.toLocaleString('id-ID')}</div>
                <div class="col-6 border-top pt-2"><strong>Total:</strong></div>
                <div class="col-6 border-top pt-2 text-end"><strong>Rp ${total.toLocaleString('id-ID')}</strong></div>
            </div>
        `;
    }

    // Fungsi global untuk ubah pemeriksaan
    window.ubahPemeriksaan = function() {
        // Reset selection
        pemeriksaanCards.forEach(c => c.classList.remove('selected'));
        pemeriksaanIdInput.value = '';
        pemeriksaanNamaInput.value = '';
        pemeriksaanHargaInput.value = '';
        
        // Show modal
        pemeriksaanModal.show();
        
        // Reset tampilan
        selectedPemeriksaanDiv.innerHTML = '<p class="text-muted mb-0">Belum ada pemeriksaan dipilih</p>';
        biayaSummaryDiv.innerHTML = '<p class="text-muted mb-0">Pilih pemeriksaan terlebih dahulu</p>';
        submitBtn.disabled = true;
    };
});
</script>
@endsection