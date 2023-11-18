<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            [
                'material_name' => "Tanah liat",
                'stock' => "100",
                'unit' => "kg",
                'price' => 5000,
                'status' => "SAFE",
                'material_category_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
            ],
            [
                'material_name' => "Pigmen Warna",
                'stock' => "50",
                'unit' => "ons",
                'price' => 10000,
                'status' => "SAFE",
                'material_category_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
            ],
            [
                'material_name' => "Roda Pahat",
                'stock' => "10",
                'unit' => "buah",
                'price' => 20000,
                'status' => "SAFE",
                'material_category_id' => 2,
                'user_id' => 2,
                'created_at' => now(),
            ],
        ]);
    }
}
