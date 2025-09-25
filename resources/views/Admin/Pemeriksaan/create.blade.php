<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold text-[#C75E5E] text-center mb-6">Tambah Data Pemeriksaan</h2>

        <form action="{{ route('admin.pemeriksaan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full rounded-lg border-gray-300 focus:border-[#C75E5E] focus:ring focus:ring-[#F0BAAF] focus:ring-opacity-50" required>
            </div>

            <!-- Detail -->
            <div>
                <label for="detail" class="block text-sm font-medium text-gray-700 mb-1">Detail</label>
                <input type="text" name="detail" id="detail" class="w-full rounded-lg border-gray-300 focus:border-[#C75E5E] focus:ring focus:ring-[#F0BAAF] focus:ring-opacity-50" required>
            </div>

            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input type="number" name="harga" id="harga" class="w-full rounded-lg border-gray-300 focus:border-[#C75E5E] focus:ring focus:ring-[#F0BAAF] focus:ring-opacity-50" required>
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" 
                       class="w-full rounded-lg border-gray-300 focus:border-[#C75E5E] focus:ring focus:ring-[#F0BAAF] focus:ring-opacity-50 bg-white" required>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('admin.pemeriksaan.index') }}" 
                   class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium transition">
                   Kembali
                </a>
                <button type="submit" 
                        class="px-5 py-2 rounded-lg bg-[#C75E5E] hover:bg-[#a74b4b] text-white font-medium transition">
                        Simpan
                </button>
            </div>
        </form>
    </div>

</body>
</html>