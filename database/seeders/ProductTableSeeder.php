<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'TV', 'description' => 'The best TV.', 'user_id' => '1', 'category_id' => '1'],
            ['name' => 'Food', 'description' => 'The best Food.', 'user_id' => '2', 'category_id' => '2'],
            ['name' => 'auto', 'description' => 'The best auto.', 'user_id' => '3', 'category_id' => '3']
        ];

        foreach ($products as $value) {
            Product::create($value);
        }
    }
}
