<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SimpananSeeder::class);
        $this->call(PinjamanSeeder::class);
        $this->call(CicilanSeeder::class);
        $this->call(KeperluanSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DataSeeder::class);
    }
}
