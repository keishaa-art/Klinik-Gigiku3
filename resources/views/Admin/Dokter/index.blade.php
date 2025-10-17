<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter</title>
</head>
<body>

<h2>Data Dokter</h2>


<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Spesialis</th>
            <th>Cabang</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dokters as $index => $dokter)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dokter->name }}</td>
                <td>{{ $dokter->nip }}</td>
                <td>{{ $dokter->spesialis ?? '-' }}</td>
                <td>{{ $dokter->cabang->nama ?? '-' }}</td>
                <td>{{ $dokter->jenis_kelamin ?? '-' }}</td>
                <td>{{ $dokter->no_telepon ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.dokter.edit', $dokter->id) }}">Edit</a> |
                    <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" align="center">Belum ada data dokter.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>