<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductCategory::create([
            "name"=> "Souvenir",
            "description"=> "Souvenir anak IT",
        ]);

        ProductCategory::create([
            "name"=> "Baju",
            "description"=> "Baju ala anak IT",
        ]);

        ProductCategory::create([
            "name"=> "Course",
            "description"=> "Courser untuk anak IT",
        ]);
    }
}
