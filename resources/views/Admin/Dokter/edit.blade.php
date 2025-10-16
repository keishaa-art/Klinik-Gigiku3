<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokter Lengkap</title>
</head>

<body>

    <h2>Edit Dokter</h2>

    <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Data User</h3>
        <div>
            <label for="name">Nama Dokter:</label>
            <input type="text" value="{{ $dokter->name }}" disabled>
            <input type="hidden" name="name" value="{{ $dokter->name }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $dokter->user->email }}" disabled>

            <h3>Data Cabang</h3>
            <div>
                <label for="cabang_id">Cabang:</label>
                <select name="cabang_id" id="cabang_id" required onchange="tampilkanAlamat()">
                    <option value="">-- Pilih Cabang --</option>
                    @foreach ($cabangs as $cabang)
                        <option value="{{ $cabang->id }}" data-alamat="{{ $cabang->alamat }}"
                            {{ $dokter->cabang_id == $cabang->id ? 'selected' : '' }}>
                            {{ $cabang->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="alamat_cabang">Alamat Cabang:</label>
                <textarea id="alamat_cabang" readonly>
            {{ $dokter->cabang->alamat }}
        </textarea>
            </div>

            <h3>Data Dokter</h3>
            <div>
                <label for="nip">NIP:</label>
                <input type="text" name="nip" id="nip" value="{{ $dokter->nip }}" required>
            </div>

            <div>
                <label for="spesialis">Spesialis:</label>
                <input type="text" name="spesialis" id="spesialis" value="{{ $dokter->spesialis }}">
            </div>

            <div>
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $dokter->tgl_lahir }}">
            </div>

            <div>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ $dokter->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ $dokter->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div>
                <label for="no_telepon">No Telepon:</label>
                <input type="text" name="no_telepon" id="no_telepon" value="{{ $dokter->no_telepon }}">
            </div>

            <div>
                <label for="alamat">Alamat Dokter:</label>
                <textarea name="alamat" id="alamat">{{ $dokter->alamat }}</textarea>
            </div>

            <div>
                <button type="submit">Simpan Perubahan</button>
                <a href="{{ route('admin.dokter.index') }}">Kembali</a>
            </div>
    </form>

    <script>
        function tampilkanAlamat() {
            let select = document.getElementById("cabang_id");
            let alamat = select.options[select.selectedIndex].getAttribute("data-alamat");
            document.getElementById("alamat_cabang").value = alamat ?? "";
        }
    </script>

</body>

</html>