<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TableBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_b')->insert([
            'kode_toko' => '1',
            'nominal_transaksi' => 1000,
        ]);
        DB::table('table_b')->insert([
            'kode_toko' => '2',
            'nominal_transaksi' => 1000,
        ]);
        DB::table('table_b')->insert([
            'kode_toko' => '4',
            'nominal_transaksi' => 1000,
        ]);
        DB::table('table_b')->insert([
            'kode_toko' => '6',
            'nominal_transaksi' => 1000,
        ]);
        DB::table('table_b')->insert([
            'kode_toko' => '7',
            'nominal_transaksi' => 1000,
        ]);
    }
}
