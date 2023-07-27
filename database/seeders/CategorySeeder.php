<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create(['name' => 'Jewellery']);
        Category::create(['name' => 'Garments']);
        Category::create(['name' => 'Footwear']);
        Category::create(['name' => 'Eyewear']);
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Customized']);
    }
}
