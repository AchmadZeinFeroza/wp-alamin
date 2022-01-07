<?php

use Illuminate\Database\Seeder;

class KeperluanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_keperluan')->insert([
            'nama' => 'Modal Usaha',
        ]);
        DB::table('kategori_keperluan')->insert([
            'nama' => 'Bukan Modal Usaha',
        ]);
    }
}
