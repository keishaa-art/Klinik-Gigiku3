<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cabang;
use App\Models\dokter;
use App\Models\PetugasFarmasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'email' => 'admin01@example.com',
            'password' => Hash::make('Admin123'),
            'role' => 'Admin',
        ]);

        // Cabang
        $cabangUtama = Cabang::create([
            'nama' => 'Cabang Utama',
            'alamat' => 'Jl. Contoh No. 1, Kota Contoh',
        ]);

        // Dokter
        $dokterUser = User::create([
            'email' => 'dokterfindafredina@example.com',
            'password' => Hash::make('Dokter123'),
            'role' => 'Dokter',
        ]);

        dokter::create([
            'user_id'       => $dokterUser->id,
            'name' => 'Dokter Finda Fredina',
            'nip'           => 'DOK001',
            'spesialis'     => 'Dokter Umum',
            'tgl_lahir'     => '1990-05-15',
            'jenis_kelamin' => 'Perempuan',
            'no_telepon'    => '081234567890',
            'alamat'        => 'Jl. Tentara Pelajar No. 12 E, Pekalangan Pekalipan, Cirebon Jawa Barat, 45118',
            'cabang_id'     => $cabangUtama->id,
        ]);

        // Petugas Farmasi
        $farmasiUser = User::create([
            'email' => 'farmasi@example.com',
            'password' => Hash::make('Farmasi123'),
            'role' => 'Farmasi',
        ]);

        PetugasFarmasi::create([
            'user_id'    => $farmasiUser->id,
            'name' => 'Lina Apoteker',
            'nip'        => 'FAR001',
            'no_izin'    => 'IZN-2025-001',
            'no_telepon' => '082345678901',
            'alamat'     => 'Jl. Tentara Pelajar No. 12 E, Pekalangan Pekalipan, Cirebon Jawa Barat, 45118',
        ]);
    }
}
