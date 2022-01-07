<?php

use Illuminate\Database\Seeder;

class SimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_simpanan')->insert([
            'nama' => '0 - 1.000.000',
        ]);
        DB::table('kategori_simpanan')->insert([
            'nama' => '1.000.000 - 3.000.000',
        ]);
        DB::table('kategori_simpanan')->insert([
            'nama' => '> 3.000.000',
        ]);
    }
}
