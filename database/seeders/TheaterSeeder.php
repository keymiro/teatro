<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theaters')->insert([
            'name'                =>'El ingenioso caballero Don Quijote de la Mancha',
            'row'                 =>'5',
            'column'                 =>'10',
            'created_at'          =>'2022-09-09 14:00:00'
        ]);

        DB::table('theaters')->insert([
            'name'                =>'Romeo y Julieta',
            'row'                 =>'5',
            'column'                 =>'10',
            'created_at'          =>'2022-09-09 16:00:00'
        ]);
    }
}
