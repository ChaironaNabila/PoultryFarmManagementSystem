<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PakanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('pakans')->insert([
            'nama_pakan' => 'PK001',
            'jenis_pakan' => 'Jagung',
            'stok_pakan' => 5,
            'tanggal_diperbarui' => '2024-09-27',
        ]);
    }
}
