 @extends('layouts.admin-layout')

 @section('konten')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cabang</title>
</head>
<body>
    <div class="d-flex">
        <h4>Data Cabang Klinik Gigiku</h4>
    </div>
    <div class="d-flex">
        <a href="{{ route('admin.cabang.create') }}" class="ml-auto">
            <button class="btn btn-primary">Tambah Cabang</button>
        </a>
    </div>

    <table class="mt-3 table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Cabang</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cabang as $no => $cabang)
                <tr>
                    <td> {{ $no + 1 }} </td>
                    <td> {{ $cabang->nama }} </td>
                    <td> {{ $cabang->alamat }} </td>
                    <td> 
                        <form action="{{ route('admin.cabang.destroy', $cabang->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <a href="{{ route('admin.cabang.edit', $cabang->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                        </form>     
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection