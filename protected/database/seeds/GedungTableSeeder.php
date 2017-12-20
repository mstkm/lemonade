<?php

use Illuminate\Database\Seeder;

class GedungTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gedungs=array(
            ['id'=> 1,
            'name'=>'X.O. Suki',
            'alamat'=>'JL. Raya Kupang Indah, No. 15, Surabaya',
            'keterangan'=>'Tidak ada'	],
            ['id'=> 2,
            'name'=>'Grand Royal Ballroom',
            'alamat'=>'Gebang Pratama, No. 6-8, Surabaya',
            'keterangan'=>'Tidak ada'	],
            ['id'=> 3,
            'name'=>'XXI Lounge Ciputra World',
            'alamat'=>'Ciputra World Surabaya , L4 , JL. Mayjen Sungkuno, 89, Surabaya',
            'keterangan'=>'Tidak ada'],
            );

        DB::table('gedungs')->insert($gedungs);
    }
}
