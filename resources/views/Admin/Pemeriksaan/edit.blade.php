<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pemeriksaan</title>
</head>
<body>
    <div class="d-flex">
        <h4>Edit Data</h4>
    </div>

    <form action="{{ route('admin.pemeriksaan.update', $pemeriksaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pemeriksaan->nama }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="detail">Detail</label>
            <input type="text" name="detail" id="detail" class="form-control" value="{{ $pemeriksaan->detail }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ $pemeriksaan->harga }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            @if ($pemeriksaan->gambar)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $pemeriksaan->gambar) }}" alt="Gambar Pemeriksaan" style="max-height: 150px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('admin.pemeriksaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
