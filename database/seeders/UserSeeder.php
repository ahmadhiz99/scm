<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'fullname' => "John Doe",
                'email' => 'johndoe@gmail.com',
                'password' => bcrypt("pass123"),
                'role_id' => 1
            ],
            [
                'fullname' => "Gerabah Mbah Karyo",
                'email' => 'mbahkaryo@gmail.com',
                'password' => bcrypt("pass123"),
                'role_id' => 2
            ],
            [
                'fullname' => "Ahmad Hizbullah Akbar",
                'email' => 'akbar@gmail.com',
                'password' => bcrypt("pass123"),
                'role_id' => 3
            ]
        ]);
    }
}
