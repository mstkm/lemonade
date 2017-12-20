<?php

use Illuminate\Database\Seeder;

class PaketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pakets=array(
            ['id'=> 1,
            'name'=>'Gold Live Band',
            'harga'=>'11000000',
            'keterangan'=>'3 Vocalist, Keyboardist, Guitarist, Bassist, Drum, Saxophone'],
            ['id'=> 2,
            'name'=>'Diamond Acoustic Set',
            'harga'=>'8500000',
            'keterangan'=>'Male Vocalist, Female Vocalist, Keyboardist, Guitarist, Bassist, Cajon']
            );

        DB::table('pakets')->insert($pakets);
    }
}
