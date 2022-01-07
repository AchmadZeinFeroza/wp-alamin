<?php

use Illuminate\Database\Seeder;

class CicilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_cicilan')->insert([
            'nama' => '6',
        ]);
        DB::table('kategori_cicilan')->insert([
            'nama' => '12',
        ]);
        DB::table('kategori_cicilan')->insert([
            'nama' => '24',
        ]);
    }
}
