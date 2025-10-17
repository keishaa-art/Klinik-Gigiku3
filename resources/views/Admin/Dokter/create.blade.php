<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Dokter</title>
</head>

<body>

    <h2>Tambah Data Dokter</h2>

    <form action="{{ route('admin.dokter.store') }}" method="POST">
        @csrf

        <div>
            <label for="user_id">Pilih Akun Dokter:</label>
            <select name="user_id" id="user_id" required>
                <option value="">-- Pilih Akun User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="name">Nama Dokter:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="nip">NIP:</label>
            <input type="text" name="nip" id="nip" required>
        </div>

        <div>
            <label for="spesialis">Spesialis:</label>
            <input type="text" name="spesialis" id="spesialis">
        </div>

        <div>
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir">
        </div>

        <div>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div>
            <label for="no_telepon">No Telepon:</label>
            <input type="text" name="no_telepon" id="no_telepon">
        </div>

        <div>
            <label for="alamat">Alamat Dokter:</label>
            <textarea name="alamat" id="alamat"></textarea>
        </div>

        <div>
            <label for="cabang_id">Cabang:</label>
            <select name="cabang_id" id="cabang_id" required>
                <option value="">-- Pilih Cabang --</option>
                @foreach ($cabangs as $cabang)
                    <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }} - {{ $cabang->alamat }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('admin.dokter.index') }}">Kembali</a>
    </form>

</body>

</html>