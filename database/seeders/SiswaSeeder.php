<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('siswa')->insert([
            'name' => 'Taufiq',
            'nomor_induk' => '1906',
            'alamat' => 'Jakarta',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'name' => 'Pujack',
            'nomor_induk' => '1907',
            'alamat' => 'Petukangan',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'name' => 'Budi',
            'nomor_induk' => '1908',
            'alamat' => 'Bandung',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
