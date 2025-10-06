<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Pemeriksaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-lg">

    <h4 class="text-2xl font-bold text-[#C75E5E] text-center mb-6">Edit Data Pemeriksaan</h4>

    <form action="{{ route('admin.pemeriksaan.update', $pemeriksaan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf
      @method('PUT')

      <!-- Nama -->
      <div>
        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
        <input type="text" name="nama" id="nama"
          value="{{ $pemeriksaan->nama }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Detail -->
      <div>
        <label for="detail" class="block text-sm font-medium text-gray-700 mb-2">Detail</label>
        <input type="text" name="detail" id="detail"
          value="{{ $pemeriksaan->detail }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Harga -->
      <div>
        <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
        <input type="number" name="harga" id="harga"
          value="{{ $pemeriksaan->harga }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Gambar -->
      <div>
        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
        <input type="file" name="gambar" id="gambar" accept="image/*"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition">

        @if ($pemeriksaan->gambar)
          <div class="mt-3">
            <img src="{{ asset('storage/' . $pemeriksaan->gambar) }}" alt="Gambar Pemeriksaan" class="max-h-40 rounded-md border">
          </div>
        @endif
      </div>

      <!-- Tombol -->
      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('admin.pemeriksaan.index') }}"
          class="px-5 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 text-white font-medium transition">
          Kembali
        </a>
        <button type="submit"
          class="px-5 py-2 rounded-lg bg-[#C75E5E] hover:bg-[#a74b4b] text-white font-medium transition">
          Update
        </button>
      </div>
    </form>
  </div>
</body>
</html>
