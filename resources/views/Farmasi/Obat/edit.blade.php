<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
</head>
<body>
    <div class="d-flex">
        <h4>Edit Obat</h4>
    </div>

    <form action="{{ route('farmasi.obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" class="form-control" value="{{ $obat->nama_obat }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="kode_obat">Kode Obat</label>
            <input type="text" name="kode_obat" id="kode_obat" class="form-control" value="{{ $obat->kode_obat }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="kandungan">Kandungan</label>
            <input type="text" name="kandungan" id="kandungan" class="form-control" value="{{ $obat->kandungan }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="bentuk_obat">Bentuk Obat</label>
            <select name="bentuk_obat" class="form-control" required>
                <option value="Obat Kumur" {{ $obat->bentuk_obat == 'Obat Kumur' ? 'selected' : '' }}>Obat Kumur</option>
                <option value="Obat Oles" {{ $obat->bentuk_obat == 'Obat Oles' ? 'selected' : '' }}>Obat Oles</option>
                <option value="Obat Minum" {{ $obat->bentuk_obat == 'Obat Minum' ? 'selected' : '' }}>Obat Minum</option>
                <option value="Obat Suntik" {{ $obat->bentuk_obat == 'Obat Suntik' ? 'selected' : '' }}>Obat Suntik</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="satuan">Satuan</label>
            <input type="number" name="satuan" id="satuan" class="form-control" value="{{ $obat->satuan }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="pieces">Pieces</label>
            <input type="number" name="pieces" id="pieces" class="form-control" value="{{ $obat->pieces }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="tgl_produksi">Tanggal Produksi</label>
            <input type="date" name="tgl_produksi" id="tgl_produksi" class="form-control" value="{{ $obat->tgl_produksi }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label>
            <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa" class="form-control" value="{{ $obat->tgl_kadaluarsa }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('farmasi.obat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
