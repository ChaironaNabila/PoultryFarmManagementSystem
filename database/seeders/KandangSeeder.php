<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class KandangSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('kandangs')->insert([
            'kode_kandang' => 'K001',
            'jenis_unggas' => 'Ayam',
            'jumlah_unggas' => 5,
            'tanggal_masuk' => '2024-09-27',
            'tanggal_keluar' => '2025-03-23',
            'status' => 'Aktif'
        ]);
    }
}
