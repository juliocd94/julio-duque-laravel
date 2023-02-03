<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            [
                'tax'          => 5.00,
                'created_at'    => Carbon::now(),
            ],
            [
                'tax'          => 15.00,
                'created_at'    => Carbon::now(),
            ],
            [
                'tax'          => 12.00,
                'created_at'    => Carbon::now(),
            ],
            [
                'tax'          => 8.00,
                'created_at'    => Carbon::now(),
            ],
            [
                'tax'          => 10.00,
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
