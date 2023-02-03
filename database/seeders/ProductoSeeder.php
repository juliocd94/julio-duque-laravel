<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'          => 'teléfono',
                'price'          => 123.45,
                'taxes_id'          => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'tablet',
                'price'          => 45.65,
                'taxes_id'          => 2,
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'mouse',
                'price'          => 39.73,
                'taxes_id'          => 3,
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'audifonos',
                'price'          => 250.00,
                'taxes_id'          => 4,
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'monitor',
                'price'          => 59.35,
                'taxes_id'          => 5,
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
