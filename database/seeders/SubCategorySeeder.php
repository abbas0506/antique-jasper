<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Subcategory::create(['name' => 'Ring', 'category_id' => 1]);
        Subcategory::create(['name' => 'Necklace', 'category_id' => 1]);
        Subcategory::create(['name' => 'Bracelet', 'category_id' => 1]);
        Subcategory::create(['name' => 'Ear Ring', 'category_id' => 1]);
        Subcategory::create(['name' => 'Gemstone (orginal)', 'category_id' => 1]);
        Subcategory::create(['name' => '925 Sterling (Chandi)', 'category_id' => 1]);
        Subcategory::create(['name' => 'Premium', 'category_id' => 1]);

        Subcategory::create(['name' => 'Abbaya', 'category_id' => 2]);
        Subcategory::create(['name' => 'Shoes', 'category_id' => 3]);
        Subcategory::create(['name' => 'Glasses', 'category_id' => 4]);

        Subcategory::create(['name' => 'Mobile Assessories', 'category_id' => 5]);
        Subcategory::create(['name' => 'Computer Assessories', 'category_id' => 5]);
        Subcategory::create(['name' => 'Camera Assessories', 'category_id' => 5]);

        Subcategory::create(['name' => 'Temperature Bottle', 'category_id' => 6]);
        Subcategory::create(['name' => 'Labelled Ring', 'category_id' => 6]);
    }
}
