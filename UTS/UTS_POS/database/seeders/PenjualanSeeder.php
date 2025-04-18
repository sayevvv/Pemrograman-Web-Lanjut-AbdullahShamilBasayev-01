<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $tanggal = Carbon::now()->subDays(10);
        $pembeli = ['Ali','Budi','Citra','Dewi','Eka','Fajar','Gina','Hadi','Indah','Joko'];
        $data = [];

        foreach ($pembeli as $i => $nama) {
            $tanggal->addDays(rand(1, 2)); // tambah 1–2 hari biar tetap urut tapi random
            $data[] = [
                'penjualan_id' => $i + 1,
                'user_id' => ($i % 3) + 1,
                'pembeli' => $nama,
                'penjualan_kode' => Str::random(8),
                'penjualan_tanggal' => $tanggal->copy(),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}
