<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CompraSeeder extends Seeder
{
    public function run()
    {
        DB::table('compras')->insert([
            [
                'user_id'          => '1',
                'product_id'          => '1',
                'price'          => '123.45',
                'tax'          => '5.00',
                'created_at'    => Carbon::now(),
            ],
            [
                'user_id'          => '1',
                'product_id'          => '2',
                'price'          => '45.65',
                'tax'          => '15.00',
                'created_at'    => Carbon::now(),
            ],
            [
                'user_id'          => '2',
                'product_id'          => '1',
                'price'          => '123.45',
                'tax'          => '5.00',
                'created_at'    => Carbon::now(),
            ],
            [
                'user_id'          => '2',
                'product_id'          => '2',
                'price'          => '45.65',
                'tax'          => '15.00',
                'created_at'    => Carbon::now(),
            ],
            [
                'user_id'          => '1',
                'product_id'          => '1',
                'price'          => '123.45',
                'tax'          => '5.00',
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
