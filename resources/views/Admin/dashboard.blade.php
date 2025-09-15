    @extends('layouts.admin-layout')

    @section('konten')



        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
          <h1 class="text-3xl font-bold mb-6">Selamat Datang, Admin!</h1>

          <!-- Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-4">
              <p class="text-gray-500">Total Pasien</p>
              <h2 class="text-2xl font-bold">0</h2>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
              <p class="text-gray-500">Total dokter</p>
              <h2 class="text-2xl font-bold">15</h2>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
              <p class="text-gray-500">Total pengunjung hari ini</p>
              <h2 class="text-2xl font-bold">12</h2>
            </div>
          </div>

          <div class="bg-white rounded-lg shadow p-4">
  <h2 class="text-xl font-bold mb-4">Data Account</h2>
  <div class="overflow-x-auto">
    <table class="w-full text-left border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-4 border-b">No</th>
          <th class="py-2 px-4 border-b">Nama</th>
          <th class="py-2 px-4 border-b">Email</th>
          <th class="py-2 px-4 border-b">Role</th>
          <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">1</td>
          <td class="py-2 px-4 border-b">John Doe</td>
          <td class="py-2 px-4 border-b">johndoe@example.com</td>
          <td class="py-2 px-4 border-b">Admin</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">2</td>
          <td class="py-2 px-4 border-b">Jane Smith</td>
          <td class="py-2 px-4 border-b">janesmith@example.com</td>
          <td class="py-2 px-4 border-b">Dokter</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">3</td>
          <td class="py-2 px-4 border-b">Michael Johnson</td>
          <td class="py-2 px-4 border-b">michael@example.com</td>
          <td class="py-2 px-4 border-b">Pasien</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>



    @endsection