<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Ali', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Budi', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Citra', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Dewi', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Eka', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Fajar', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'Gina', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 8, 'user_id' => 2, 'pembeli' => 'Hadi', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Indah', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Joko', 'penjualan_kode' => Str::random(8), 'penjualan_tanggal' => now()],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
