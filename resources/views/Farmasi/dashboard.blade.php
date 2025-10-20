@extends('layouts.farnasi-layout')

@section('konten')
  <h2 class="text-xl font-bold mb-4">Data Obat</h2>
  <div class="overflow-x-auto">
    <table class="w-full text-left border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-4 border-b">No</th>
          <th class="py-2 px-4 border-b">Nama  Obat</th>
          <th class="py-2 px-4 border-b">Stok</th>
          <th class="py-2 px-4 border-b">Harga</th>
          <th class="py-2 px-4 border-b">Kadaluarsa</th>
          <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">1</td>
          <td class="py-2 px-4 border-b">Parasetamol</td>
          <td class="py-2 px-4 border-b">2000</td>
          <td class="py-2 px-4 border-b">19.000</td>
          <td class="py-2 px-4 border-b">29-09-2030</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">1</td>
          <td class="py-2 px-4 border-b">Parasetamol</td>
          <td class="py-2 px-4 border-b">2000</td>
          <td class="py-2 px-4 border-b">19.000</td>
          <td class="py-2 px-4 border-b">29-09-2030</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">1</td>
          <td class="py-2 px-4 border-b">Parasetamol</td>
          <td class="py-2 px-4 border-b">2000</td>
          <td class="py-2 px-4 border-b">19.000</td>
          <td class="py-2 px-4 border-b">29-09-2030</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border-b">1</td>
          <td class="py-2 px-4 border-b">Parasetamol</td>
          <td class="py-2 px-4 border-b">2000</td>
          <td class="py-2 px-4 border-b">19.000</td>
          <td class="py-2 px-4 border-b">29-09-2030</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection