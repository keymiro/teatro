<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'          =>'Camilo',
            'last_name'           =>'Mancipe',
            'dni'                 =>'123456789',
            'email'               =>'camilomancipe@gmail.com',
            'password'            => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'first_name'          =>'Maritza',
            'last_name'           =>'Martinez',
            'dni'                 =>'987654321',
            'email'               =>'maritzamartinez@gmail.com',
            'password'            => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'first_name'          =>'Jose',
            'last_name'           =>'Parra',
            'dni'                 =>'23456987',
            'email'               =>'joseparra@gmail.com',
            'password'            => Hash::make('123456789'),
            'discharge_date'      =>'2021-09-05 20:29:49',
        ]);
    }
}
