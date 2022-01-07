<?php

use Illuminate\Database\Seeder;

class PinjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_pinjaman')->insert([
            'nama' => '1.000.000',
        ]);
        DB::table('kategori_pinjaman')->insert([
            'nama' => '2.000.000',
        ]);
    }
}
