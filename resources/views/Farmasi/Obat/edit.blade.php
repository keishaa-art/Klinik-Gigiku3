<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Obat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-lg">
    <h2 class="text-2xl font-bold text-[#C75E5E] text-center mb-6">Edit Obat</h2>

    <form action="{{ route('farmasi.obat.update', $obat->id) }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <!-- Nama Obat -->
      <div>
        <label for="nama_obat" class="block text-sm font-medium text-gray-700 mb-2">Nama Obat</label>
        <input type="text" name="nama_obat" id="nama_obat"
          value="{{ $obat->nama_obat }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Kode Obat -->
      <div>
        <label for="kode_obat" class="block text-sm font-medium text-gray-700 mb-2">Kode Obat</label>
        <input type="text" name="kode_obat" id="kode_obat"
          value="{{ $obat->kode_obat }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Kandungan -->
      <div>
        <label for="kandungan" class="block text-sm font-medium text-gray-700 mb-2">Kandungan</label>
        <input type="text" name="kandungan" id="kandungan"
          value="{{ $obat->kandungan }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Bentuk Obat -->
      <div>
        <label for="bentuk_obat" class="block text-sm font-medium text-gray-700 mb-2">Bentuk Obat</label>
        <select name="bentuk_obat" id="bentuk_obat"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
          <option value="Obat Kumur" {{ $obat->bentuk_obat == 'Obat Kumur' ? 'selected' : '' }}>Obat Kumur</option>
          <option value="Obat Oles" {{ $obat->bentuk_obat == 'Obat Oles' ? 'selected' : '' }}>Obat Oles</option>
          <option value="Obat Minum" {{ $obat->bentuk_obat == 'Obat Minum' ? 'selected' : '' }}>Obat Minum</option>
          <option value="Obat Suntik" {{ $obat->bentuk_obat == 'Obat Suntik' ? 'selected' : '' }}>Obat Suntik</option>
        </select>
      </div>

      <!-- Satuan -->
      <div>
        <label for="satuan" class="block text-sm font-medium text-gray-700 mb-2">Satuan</label>
        <input type="number" name="satuan" id="satuan"
          value="{{ $obat->satuan }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Pieces -->
      <div>
        <label for="pieces" class="block text-sm font-medium text-gray-700 mb-2">Pieces</label>
        <input type="number" name="pieces" id="pieces"
          value="{{ $obat->pieces }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Tanggal Produksi -->
      <div>
        <label for="tgl_produksi" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Produksi</label>
        <input type="date" name="tgl_produksi" id="tgl_produksi"
          value="{{ $obat->tgl_produksi }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Tanggal Kadaluarsa -->
      <div>
        <label for="tgl_kadaluarsa" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kadaluarsa</label>
        <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa"
          value="{{ $obat->tgl_kadaluarsa }}"
          class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 focus:bg-white focus:border-[#C75E5E] focus:ring-2 focus:ring-[#F0BAAF] transition"
          required>
      </div>

      <!-- Tombol -->
      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('farmasi.obat.index') }}" 
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
