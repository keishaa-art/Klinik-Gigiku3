@section('content')
<div class="container">
    <h2>Buat Reservasi Baru</h2>
    <form action="{{ route('pasien.reservasi.store') }}" method="POST">
        @csrf

        {{-- Cabang --}}
        <div class="mb-3">
            <label for="cabang_id" class="form-label">Cabang</label>
            <select id="cabang_id" name="cabang_id" class="form-select" required>
                <option value="">-- Pilih Cabang --</option>
                @foreach($cabangs as $c)
                    <option value="{{ $c->id }}">{{ $c->nama_cabang }}</option>
                @endforeach
            </select>
        </div>

        {{-- Dokter --}}
        <div class="mb-3">
            <label for="dokter_id" class="form-label">Dokter</label>
            <select id="dokter_id" name="dokter_id" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
            </select>
        </div>

        {{-- Jadwal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control" required>
        </div>

        {{-- Pemeriksaan --}}
        <div class="mb-3">
            <label for="pemeriksaan_id" class="form-label">Pemeriksaan</label>
            <select id="pemeriksaan_id" name="pemeriksaan_id" class="form-select" required>
                <option value="">-- Pilih Pemeriksaan --</option>
                @foreach($pemeriksaans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pemeriksaan }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Buat Reservasi</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#cabang_id').change(function() {
    let cabangId = $(this).val();
    $('#dokter_id').html('<option value="">Loading...</option>');
    $.get('/get-dokter/' + cabangId, function(data) {
        if (data.length === 0) {
            $('#dokter_id').html('<option value="">Tidak ada dokter</option>');
        } else {
            let html = '<option value="">-- Pilih Dokter --</option>';
            data.forEach(d => {
                html += `<option value="${d.id}">${d.name}</option>`;
            });
            $('#dokter_id').html(html);
        }
    });
});

$('#dokter_id').change(function() {
    let dokterId = $(this).val();
    let cabangId = $('#cabang_id').val();
    $.get(`/get-jadwal/${dokterId}/${cabangId}`, function(res) {
        if (!res.status) {
            alert(res.message);
        }
    });
});
</script>
@endsection
