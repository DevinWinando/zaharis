<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => Hash::make('admin'), 'role' => 'admin'],
            ['username' => 'resepsionis', 'password' => Hash::make('resepsionis'), 'role' => 'resepsionis'],
        ]);

        DB::table('tipe_kamar')->insert([
            ['nama' => 'Standard Room', 'harga' => 300000],
            ['nama' => 'Deluxe Room', 'harga' => 500000],
            ['nama' => 'Suite Room', 'harga' => 1000000],
        ]);

        DB::table('kamar')->insert([
            ['nomor' => 101, 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 2 orang', 'id_tipe' => 1, 'dipesan' => 0, 'gambar' => '1648513012001_small-hotel-room-interior-with-double-bed-bathroom (1).webp'],
            ['nomor' => 102, 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 2 orang', 'id_tipe' => 1, 'dipesan' => 0, 'gambar' => '1648513012002_small-hotel-room-interior-with-double-bed-bathroom (1).webp'],
            ['nomor' => 103, 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 2 orang', 'id_tipe' => 1, 'dipesan' => 0, 'gambar' => '1648513012003_small-hotel-room-interior-with-double-bed-bathroom (1).webp'],
            ['nomor' => 104, 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 2 orang', 'id_tipe' => 1, 'dipesan' => 0, 'gambar' => '1648513012004_small-hotel-room-interior-with-double-bed-bathroom (1).webp'],
            ['nomor' => 201, 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 2 orang, sofa, televisi','dipesan' => 0, 'id_tipe' => 2, 'gambar' => '1648513316001_cozy-studio-apartment-with-bedroom-living-space (1).webp'],
            ['nomor' => 202, 'deskripsi' => 'Ruangan ber-ac, kamar mandi di dalam, double bed, kapasitas 2 orang, sofa, televisi','dipesan' => 0, 'id_tipe' => 2, 'gambar' => '1648513316002_cozy-studio-apartment-with-bedroom-living-space (1).webp'],
        ]);
    }
}