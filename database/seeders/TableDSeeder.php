<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TableDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_d')->insert([
            'kode_sales' => 'A1',
            'nama_sales' => 'Alpha',
        ]);
        DB::table('table_d')->insert([
            'kode_sales' => 'A2',
            'nama_sales' => 'Blue',
        ]);
        DB::table('table_d')->insert([
            'kode_sales' => 'A3',
            'nama_sales' => 'Charlie',
        ]);
        DB::table('table_d')->insert([
            'kode_sales' => 'B1',
            'nama_sales' => 'Delta',
        ]);
        DB::table('table_d')->insert([
            'kode_sales' => 'B2',
            'nama_sales' => 'Echo',
        ]);
    }
}
