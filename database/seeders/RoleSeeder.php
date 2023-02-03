<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'          => 'Cliente',
                'created_at'    => Carbon::now(),
            ],
            [
                'name' => 'Administrador',
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
