<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1,'kategori_kode' => Str::random(10), 'kategori_nama' => 'Buku'],
            ['kategori_id' => 2,'kategori_kode' => Str::random(10), 'kategori_nama' => 'Tas'],
            ['kategori_id' => 3,'kategori_kode' => Str::random(10), 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => 4,'kategori_kode' => Str::random(10), 'kategori_nama' => 'Sepatu'],
            ['kategori_id' => 5,'kategori_kode' => Str::random(10), 'kategori_nama' => 'Pakaian']
        ];
        DB::table('m_kategori')->insert($data);
    }
}
