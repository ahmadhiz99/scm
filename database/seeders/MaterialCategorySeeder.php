<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('material_categories')->insert([
            [
                'material_category_name' => "Bahan Mentah",
                'user_id' => 2,
                'created_at' => now(),
            ],
            [
                'material_category_name' => "Peralatan",
                'user_id' => 2,
                'created_at' => now(),
            ],
        ]);
    }
}
