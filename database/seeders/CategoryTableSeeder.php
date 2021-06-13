<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Laptops', 'slug' => 'laptops'],
            ['name' => 'Desktops', 'slug' => 'desktops'],
            ['name' => 'Mobile Phones', 'slug' => 'mobile-phones'],
            ['name' => 'Tablets', 'slug' => 'tablets'],
            ['name' => 'TVs', 'slug' => 'tvs'],
            ['name' => 'Digital Cameras', 'slug' => 'digital-cameras'],
            ['name' => 'Appliances', 'slug' => 'appliances'],
        ]);
    }
}
