<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TableCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_c')->insert([
            'kode_toko' => '1',
            'area_sales' => 'A',
        ]);
        DB::table('table_c')->insert([
            'kode_toko' => '2',
            'area_sales' => 'A',
        ]);
        DB::table('table_c')->insert([
            'kode_toko' => '3',
            'area_sales' => 'A',
        ]);
        DB::table('table_c')->insert([
            'kode_toko' => '4',
            'area_sales' => 'B',
        ]);
        DB::table('table_c')->insert([
            'kode_toko' => '5',
            'area_sales' => 'B',
        ]);
    }
}
