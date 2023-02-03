<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'              => 'Sylvester Stallone',
                'email'             => 'stallone@gmail.com',
                'role_id'           => '1',
                'password'          => Hash::make('12345678'),
                'created_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Lionel Messi',
                'email'             => 'messi@gmail.com',
                'role_id'           => '1',
                'password'          => Hash::make('12345678'),
                'created_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Homero Simpson',
                'email'             => 'simpson@gmail.com',
                'role_id'           => '2',
                'password'          => Hash::make('12345678'),
                'created_at'        => Carbon::now(),
            ], 
        ]);
    }
}