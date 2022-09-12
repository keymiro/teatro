<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'code'          =>'COD_E68A1',
            'seat'          =>'2-3',
            'theater_id'   =>1,
            'user_id'       =>1,
            'created_at'    =>'2022-08-07 20:29:45'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68A1',
            'seat'          =>'2-4',
            'theater_id'   =>1,
            'user_id'       =>1,
            'created_at'    =>'2022-08-07 20:29:49'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68A1',
            'seat'          =>'4-10',
            'theater_id'   =>1,
            'user_id'       =>1,
            'created_at'    =>'2022-08-07 20:29:56'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68A2',
            'seat'          =>'2-2',
            'theater_id'   =>1,
            'user_id'       =>2,
            'created_at'    =>'2022-09-05 20:29:45'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68A2',
            'seat'          =>'2-5',
            'theater_id'   =>1,
            'user_id'       =>2,
            'created_at'    =>'2022-09-05 20:29:49'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68A2',
            'seat'          =>'2-6',
            'theater_id'   =>1,
            'user_id'       =>2,
            'created_at'    =>'2022-09-05 20:29:56'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68B1',
            'seat'          =>'2-2',
            'theater_id'   =>2,
            'user_id'       =>2,
            'created_at'    =>'2022-09-05 20:29:45'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68B2',
            'seat'          =>'2-3',
            'theater_id'   =>2,
            'user_id'       =>2,
            'created_at'    =>'2022-09-05 20:29:49'
        ]);

        DB::table('reservations')->insert([
            'code'          =>'COD_E68B3',
            'seat'          =>'2-4',
            'theater_id'   =>2,
            'user_id'       =>2,
            'created_at'    =>'2022-09-05 20:29:56'
        ]);
    }
}
