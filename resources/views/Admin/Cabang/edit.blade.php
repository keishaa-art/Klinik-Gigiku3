<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Cabang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-lg bg-white p-6 rounded-xl shadow-md">

    <!-- Judul -->
    <h4 class="text-xl font-semibold text-gray-800 mb-6 text-center">
      Edit Data Cabang
    </h4>

    <!-- Form Edit -->
    <form action="{{ route('admin.cabang.update', $cabang->id) }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <!-- Input Nama -->
      <div>
        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama" id="nama"
          value="{{ $cabang->nama }}"
          class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
          required>
      </div>

      <!-- Input Alamat -->
      <div>
        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
        <input type="text" name="alamat" id="alamat"
          value="{{ $cabang->alamat }}"
          class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
          required>
      </div>

      <!-- Tombol -->
      <div class="flex gap-3 pt-2">
        <button type="submit"
          class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow-sm transition">
          Update
        </button>
        <a href="{{ route('admin.cabang.index') }}"
          class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 shadow-sm transition">
          Kembali
        </a>
      </div>
    </form>
  </div>
</body>
</html>
