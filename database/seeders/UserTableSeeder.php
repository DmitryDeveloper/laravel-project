<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'role' => 'User::ROLE_ADMIN',
                'email' => 'config(users.admin_email)',
                'password' => 'config(users.admin_password)'
            ],
            [
                'first_name' => 'Andrei',
                'last_name' => 'Kozladornia',
                'role' => 'User::ROLE_MODERATOR',
                'email' => 'andry@mail.com',
                'password' => '111111111'
            ],
            [
                'first_name' => 'Maks',
                'last_name' => 'Pokidzko',
                'role' => 'User::ROLE_MODERATOR',
                'email' => 'maks@mail.com',
                'password' => '222222222'
            ]
        ];

        foreach ($users as $value) {
            User::create($value);
        }
    }
}
