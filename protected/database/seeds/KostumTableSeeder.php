<?php

use Illuminate\Database\Seeder;

class KostumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kostums=array(
            ['id'=> 1,
            'name'=>'Hitam dasi Emas',
            'foto'=>'img_kkk',
            'keterangan'=>'Jas hitam dan dasi putih'],
            ['id'=> 2,
            'nama'=>'Putih',
            'foto'=>'img_aaa',
            'keterangan'=>'Jas putih'],
            ['id'=> 3,
            'nama'=>'Hitam',
            'foto'=>'img_mm',
            'keterangan'=>'Jas hitam dan dasi putih']
            );

        DB::table('kostums')->insert($kostums);
    }
}
