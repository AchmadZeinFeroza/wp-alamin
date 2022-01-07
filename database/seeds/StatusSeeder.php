<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_status')->insert([
            'nama' => 'Layak',
        ]);
        DB::table('kategori_status')->insert([
            'nama' => 'Tidak Layak',
        ]);
    }
}
