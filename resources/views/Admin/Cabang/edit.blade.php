<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Cabang</title>
</head>
<body>
    <div class="d-flex">
        <h4>Edit Data</h4>
    </div>

    <form action="{{ route('cabang.update', $cabang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $cabang->nama }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $cabang->alamat }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('cabang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
