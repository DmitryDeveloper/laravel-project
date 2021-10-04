<?php

namespace Database\Seeders;

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
        Product::create([
            'name' => 'milk',
            'description' => 'Very very tasty milk.',
            'user_id' => '1',
            'category_id' => '1',
        ]);
    }
}
