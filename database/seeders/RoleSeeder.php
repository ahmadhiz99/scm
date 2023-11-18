<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_name' => "admin",
                'level' => 1,
                'created_at' => now(),
            ],
            [
                'role_name' => "umkm",
                'level' => 2,
                'created_at' => now(),
            ],
            [
                'role_name' => "customer",
                'level' => 3,
                'created_at' => now(),
            ],
        ]);
    }
}
