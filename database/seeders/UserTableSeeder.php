<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Andrey',
            'last_name' => 'Kozirev',
            'role' => 'administrator',
            'email' => 'kozirev@gmail.com',
            'password' => '1234567890',
        ]);
    }
}
