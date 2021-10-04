<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'TV'],
            ['name' => 'Food'],
            ['name' => 'auto']
        ];

        foreach ($categories as $value) {
            Category::create($value);
        }
    }
}
