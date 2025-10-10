<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
</head>
<body>
    <div class="d-flex">
        <h4>Tambah Obat</h4>
    </div>

    <form action="{{ route('farmasi.obat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="kode_obat">Kode Obat</label>
            <input type="text" name="kode_obat" id="kode_obat" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="kandungan">Kandungan</label>
            <input type="text" name="kandungan" id="kandungan" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="bentuk_obat">Bentuk Obat</label>
                <select name="bentuk_obat" class="form-control" required>
                    <option value="Obat Kumur">Obat Kumur</option>
                    <option value="Obat Oles">Obat Oles</option>
                    <option value="Obat Minum">Obat Minum</option>
                    <option value="Obat Suntik">Obat Suntik</option>
                </select>       
        </div>

        <div class="form-group mt-3">
            <label for="satuan">Satuan</label>
            <input type="number" name="satuan" id="satuan" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="pieces">Pieces</label>
            <input type="number" name="pieces" id="pieces" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="tgl_produksi">Tanggal Produksi</label>
            <input type="date" name="tgl_produksi" id="tgl_produksi" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label>
            <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('farmasi.obat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
