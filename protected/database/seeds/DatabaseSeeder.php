<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(KostumTableSeeder::class);
        $this->call(PaketTableSeeder::class);
        $this->call(GedungTableSeeder::class);
    }
}
