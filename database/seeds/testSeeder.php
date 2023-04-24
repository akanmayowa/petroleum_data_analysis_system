<?php

use Illuminate\Database\Seeder;

class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrdata=[
            ['name'=>'Maria','BG'=>'AB+','amount'=>7],
            ['name'=>'Maria','BG'=>'AB+','amount'=>3],
            ['name'=>'Maria','BG'=>'A-','amount'=>6],
            ['name'=>'Maria','BG'=>'AB+','amount'=>9],
            ['name'=>'Maria','BG'=>'A+','amount'=>1],
        ];
        foreach($arrdata as $data){
            \DB::table('donor')->insert($data);
        }
        $acceptor=[
            ['name'=>'Maria','BG'=>'A+','amount'=>9],
            ['name'=>'Maria','BG'=>'AB+','amount'=>8],
            ['name'=>'Maria','BG'=>'AB+','amount'=>3],
            ['name'=>'Maria','BG'=>'A+','amount'=>1],
            ['name'=>'Maria','BG'=>'A+','amount'=>5],
        ];
array
        foreach($acceptor as $datass){
            \DB::table('acceptor')->insert($datass);
        }
    }
}
