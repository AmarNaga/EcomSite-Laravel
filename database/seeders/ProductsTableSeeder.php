<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=30; $i++){
            Product::create([
                'product_name'  => 'Laptop ' . $i,
                'slug'          => 'laptop-' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(1);
        }

        for($i=1; $i<=9; $i++){
            Product::create([
                'product_name'  => 'Desktop ' . $i,
                'slug'          => 'desktop-' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(2);
        }
        for($i=1; $i<=9; $i++){
            Product::create([
                'product_name'  => 'Phone' . $i,
                'slug'          => 'phone' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(3);
        }

        for($i=1; $i<=9; $i++){
            Product::create([
                'product_name'  => 'Tablet ' . $i,
                'slug'          => 'tablet-' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(4);
        }

        for($i=1; $i<=9; $i++){
            Product::create([
                'product_name'  => 'TV ' . $i,
                'slug'          => 'tv-' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(5);
        }

        for($i=1; $i<=9; $i++){
            Product::create([
                'product_name'  => 'Camera ' . $i,
                'slug'          => 'camera-' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(6);
        }

        for($i=1; $i<=9; $i++){
            Product::create([
                'product_name'  => 'Appliances' . $i,
                'slug'          => 'appliances-' . $i,
                'details'       => '15 inch, 1TB SSD, 32GB RAM',
                'price'         => 24999,
                'product_desc'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
                
            ])->category()->attach(7);
        }
    }
}
