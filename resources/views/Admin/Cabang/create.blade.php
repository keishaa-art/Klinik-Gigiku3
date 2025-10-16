<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Cabang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold text-[#C75E5E] text-center mb-6">
            Tambah Daftar Cabang
        </h2>

        <form action="{{ route('admin.cabang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Nama Cabang --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="w-full rounded-lg border border-gray-300 focus:border-[#C75E5E] focus:ring focus:ring-[#F0BAAF] focus:ring-opacity-50 px-3 py-2"
                    required>
            </div>

            {{-- Alamat Cabang --}}
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    class="w-full rounded-lg border border-gray-300 focus:border-[#C75E5E] focus:ring focus:ring-[#F0BAAF] focus:ring-opacity-50 px-3 py-2"
                    required>
            </div>

            <div class="flex items-center justify-between gap-3 pt-4">
                <button type="submit"
                    class="flex-1 px-5 py-2 rounded-lg bg-[#C75E5E] hover:bg-[#a74b4b] text-white font-medium transition">
                    Simpan
                </button>
                <a href="{{ route('admin.cabang.index') }}"
                    class="flex-1 text-center px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>
