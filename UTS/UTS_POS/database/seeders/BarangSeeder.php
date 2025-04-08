<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => Str::random(10), 'barang_nama' => 'Novel', 'harga_beli' => 30000, 'harga_jual' => 40000],
            ['barang_id' => 2, 'kategori_id' => 2, 'barang_kode' => Str::random(10), 'barang_nama' => 'Backpack', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 3, 'kategori_id' => 3, 'barang_kode' => Str::random(10), 'barang_nama' => 'Headphone', 'harga_beli' => 500000, 'harga_jual' => 650000],
            ['barang_id' => 4, 'kategori_id' => 4, 'barang_kode' => Str::random(10), 'barang_nama' => 'Sneakers', 'harga_beli' => 400000, 'harga_jual' => 550000],
            ['barang_id' => 5, 'kategori_id' => 5, 'barang_kode' => Str::random(10), 'barang_nama' => 'Jacket', 'harga_beli' => 250000, 'harga_jual' => 350000],
            ['barang_id' => 6, 'kategori_id' => 1, 'barang_kode' => Str::random(10), 'barang_nama' => 'Komik', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 7, 'kategori_id' => 2, 'barang_kode' => Str::random(10), 'barang_nama' => 'Tote Bag', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 8, 'kategori_id' => 3, 'barang_kode' => Str::random(10), 'barang_nama' => 'Mouse Gaming', 'harga_beli' => 250000, 'harga_jual' => 350000],
            ['barang_id' => 9, 'kategori_id' => 4, 'barang_kode' => Str::random(10), 'barang_nama' => 'Sandal Sport', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => Str::random(10), 'barang_nama' => 'Kaos', 'harga_beli' => 75000, 'harga_jual' => 120000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
