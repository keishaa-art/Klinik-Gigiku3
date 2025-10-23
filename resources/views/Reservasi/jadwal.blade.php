@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Pilih Jadwal - Dr. {{ $dokter->name }}</h4>
                    <small class="text-muted">Step 3 of 4</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.reservasi.pemeriksaan') }}" method="POST" id="jadwalForm">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Pilih Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" 
                                   min="{{ date('Y-m-d') }}" required id="tanggalInput">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Jam</label>
                            <select name="jam" class="form-control" required id="jamSelect">
                                <option value="">Pilih Jam</option>
                                @foreach($jadwalDokter as $jadwal)
                                    @php
                                        $start = \Carbon\Carbon::parse($jadwal->jam_mulai);
                                        $end = \Carbon\Carbon::parse($jadwal->jam_selesai);
                                    @endphp
                                    @for($time = $start; $time->lt($end); $time->addMinutes(30))
                                        <option value="{{ $time->format('H:i') }}">
                                            {{ $time->format('H:i') }}
                                        </option>
                                    @endfor
                                @endforeach
                            </select>
                        </div>

                        <div id="availabilityMessage" class="alert d-none"></div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pasien.reservasi.dokter') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>
                                Lanjut ke Pemeriksaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalInput = document.getElementById('tanggalInput');
    const jamSelect = document.getElementById('jamSelect');
    const availabilityMessage = document.getElementById('availabilityMessage');
    const submitBtn = document.getElementById('submitBtn');

    function checkAvailability() {
        const tanggal = tanggalInput.value;
        const jam = jamSelect.value;
        const dokterId = '{{ session('reservasi.dokter_id') }}';
        const cabangId = '{{ session('reservasi.cabang_id') }}';

        if (tanggal && jam && dokterId && cabangId) {
            const formData = new FormData();
            formData.append('dokter_id', dokterId);
            formData.append('cabang_id', cabangId);
            formData.append('tanggal', tanggal);
            formData.append('jam', jam);

            fetch('{{ route("pasien.reservasi.check-time") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.available) {
                    availabilityMessage.className = 'alert alert-success';
                    availabilityMessage.textContent = data.message;
                    submitBtn.disabled = false;
                } else {
                    availabilityMessage.className = 'alert alert-danger';
                    availabilityMessage.textContent = data.message;
                    submitBtn.disabled = true;
                }
                availabilityMessage.classList.remove('d-none');
            });
        }
    }

    tanggalInput.addEventListener('change', checkAvailability);
    jamSelect.addEventListener('change', checkAvailability);
});
</script>
@endsection