<div class="container">
    <h2>Buat Reservasi Baru</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.reservasi.store') }}" method="POST" id="reservasiForm">
        @csrf
        
        <!-- Step 1: Pilih Cabang -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>1. Pilih Cabang</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($cabangs as $cabang)
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cabang_id" 
                                   id="cabang{{ $cabang->id }}" value="{{ $cabang->id }}" required>
                            <label class="form-check-label" for="cabang{{ $cabang->id }}">
                                <strong>{{ $cabang->nama }}</strong><br>
                                <small class="text-muted">{{ $cabang->alamat }}</small>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Step 2: Pilih Dokter -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>2. Pilih Dokter</h5>
            </div>
            <div class="card-body">
                <div id="dokterContainer">
                    <p class="text-muted">Pilih cabang terlebih dahulu</p>
                </div>
            </div>
        </div>

        <!-- Step 3: Pilih Jadwal -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>3. Pilih Jadwal</h5>
            </div>
            <div class="card-body">
                <div id="jadwalContainer">
                    <p class="text-muted">Pilih dokter terlebih dahulu</p>
                </div>
            </div>
        </div>

        <!-- Step 4: Pilih Pemeriksaan & Keluhan -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>4. Pemeriksaan & Keluhan</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Pilih Pemeriksaan</label>
                    <select name="pemeriksaan_id" class="form-control" required>
                        <option value="">Pilih Pemeriksaan</option>
                        @foreach($pemeriksaans as $pemeriksaan)
                            <option value="{{ $pemeriksaan->id }}" data-harga="{{ $pemeriksaan->harga }}">
                                {{ $pemeriksaan->nama_pemeriksaan }} - Rp {{ number_format($pemeriksaan->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keluhan</label>
                    <textarea name="keluhan" class="form-control" rows="3" 
                              placeholder="Deskripsikan keluhan Anda..."></textarea>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Ringkasan Reservasi</h5>
            </div>
            <div class="card-body">
                <div id="reservasiSummary">
                    <p class="text-muted">Lengkapi semua data terlebih dahulu</p>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn" disabled>
            Buat Reservasi
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Event ketika cabang dipilih
    document.querySelectorAll('input[name="cabang_id"]').forEach(radio => {
        radio.addEventListener('change', function() {
            loadDokters(this.value);
        });
    });

    function loadDokters(cabangId) {
        fetch(`/pasien/reservasi/get-dokter/${cabangId}`)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('dokterContainer');
                if (data.length > 0) {
                    container.innerHTML = `
                        <div class="row">
                            ${data.map(dokter => `
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dokter_id" 
                                               id="dokter${dokter.id}" value="${dokter.id}" required>
                                        <label class="form-check-label" for="dokter${dokter.id}">
                                            <strong>Dr. ${dokter.name}</strong><br>
                                            <small class="text-muted">${dokter.spesialis || 'Umum'}</small>
                                        </label>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    `;

                    // Add event listener untuk dokter yang baru dimuat
                    document.querySelectorAll('input[name="dokter_id"]').forEach(radio => {
                        radio.addEventListener('change', function() {
                            const cabangId = document.querySelector('input[name="cabang_id"]:checked').value;
                            loadJadwal(this.value, cabangId);
                        });
                    });
                } else {
                    container.innerHTML = '<p class="text-danger">Tidak ada dokter di cabang ini</p>';
                }
                updateSummary();
            });
    }

    function loadJadwal(dokterId, cabangId) {
        fetch(`/pasien/reservasi/get-jadwal/${dokterId}/${cabangId}`)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('jadwalContainer');
                
                if (data.status) {
                    container.innerHTML = `
                        <div class="row">
                            <div class="col-md-6">
                                <label for="tanggal">Tanggal Reservasi:</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" 
                                       min="${new Date().toISOString().split('T')[0]}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jam">Jam Reservasi:</label>
                                <select name="jam" id="jam" class="form-control" required>
                                    <option value="">Pilih Jam</option>
                                    ${generateTimeSlots(data.data)}
                                </select>
                            </div>
                        </div>
                        <div id="availabilityMessage" class="mt-2"></div>
                    `;

                    // Event untuk cek ketersediaan
                    document.getElementById('tanggal').addEventListener('change', checkAvailability);
                    document.getElementById('jam').addEventListener('change', checkAvailability);
                    document.getElementById('jam').addEventListener('change', updateSummary);
                } else {
                    container.innerHTML = `<p class="text-danger">${data.message}</p>`;
                }
                updateSummary();
            });
    }

    function generateTimeSlots(jadwals) {
        let slots = '';
        jadwals.forEach(jadwal => {
            const start = new Date(`1970-01-01T${jadwal.jam_mulai}`);
            const end = new Date(`1970-01-01T${jadwal.jam_selesai}`);
            
            let current = new Date(start);
            while (current < end) {
                const timeStr = current.toTimeString().substring(0, 5);
                slots += `<option value="${timeStr}">${timeStr}</option>`;
                current.setMinutes(current.getMinutes() + 30);
            }
        });
        return slots;
    }

    function checkAvailability() {
        const tanggal = document.getElementById('tanggal')?.value;
        const jam = document.getElementById('jam')?.value;
        const dokterId = document.querySelector('input[name="dokter_id"]:checked')?.value;
        const cabangId = document.querySelector('input[name="cabang_id"]:checked')?.value;

        if (tanggal && jam && dokterId && cabangId) {
            const formData = new FormData();
            formData.append('dokter_id', dokterId);
            formData.append('cabang_id', cabangId);
            formData.append('tanggal', tanggal);
            formData.append('jam', jam);

            fetch('/pasien/reservasi/check-time', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('availabilityMessage');
                if (data.available) {
                    messageDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    document.getElementById('submitBtn').disabled = false;
                } else {
                    messageDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                    document.getElementById('submitBtn').disabled = true;
                }
                updateSummary();
            });
        }
    }

    function updateSummary() {
        const cabang = document.querySelector('input[name="cabang_id"]:checked');
        const dokter = document.querySelector('input[name="dokter_id"]:checked');
        const tanggal = document.getElementById('tanggal')?.value;
        const jam = document.getElementById('jam')?.value;
        const pemeriksaan = document.querySelector('select[name="pemeriksaan_id"]');

        const summaryDiv = document.getElementById('reservasiSummary');
        
        if (cabang && dokter && tanggal && jam && pemeriksaan && pemeriksaan.value) {
            const selectedPemeriksaan = pemeriksaan.options[pemeriksaan.selectedIndex];
            const biayaReservasi = 50000;
            const biayaPemeriksaan = parseInt(selectedPemeriksaan.dataset.harga);
            const total = biayaReservasi + biayaPemeriksaan;

            summaryDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Cabang:</strong> ${document.querySelector(`label[for="cabang${cabang.value}"] strong`).textContent}</p>
                        <p><strong>Dokter:</strong> ${document.querySelector(`label[for="dokter${dokter.value}"] strong`).textContent}</p>
                        <p><strong>Tanggal:</strong> ${tanggal}</p>
                        <p><strong>Jam:</strong> ${jam}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Pemeriksaan:</strong> ${selectedPemeriksaan.textContent.split(' - ')[0]}</p>
                        <p><strong>Biaya Reservasi:</strong> Rp ${biayaReservasi.toLocaleString('id-ID')}</p>
                        <p><strong>Biaya Pemeriksaan:</strong> Rp ${biayaPemeriksaan.toLocaleString('id-ID')}</p>
                        <h5><strong>Total: Rp ${total.toLocaleString('id-ID')}</strong></h5>
                    </div>
                </div>
            `;
        } else {
            summaryDiv.innerHTML = '<p class="text-muted">Lengkapi semua data terlebih dahulu</p>';
            document.getElementById('submitBtn').disabled = true;
        }
    }

    // Event untuk update summary
    document.querySelector('select[name="pemeriksaan_id"]').addEventListener('change', updateSummary);
});
</script>