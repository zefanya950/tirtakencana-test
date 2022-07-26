<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TableASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_a')->insert([
            'kode_lama' => '6',
        ]);
        DB::table('table_a')->insert([
            'kode_lama' => null,
        ]);
        DB::table('table_a')->insert([
            'kode_lama' => '7',
        ]);
        DB::table('table_a')->insert([
            'kode_lama' => '9',
        ]);
        DB::table('table_a')->insert([
            'kode_lama' => '8',
        ]);
    }
}
