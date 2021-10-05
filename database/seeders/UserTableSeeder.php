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
                'first_name' => 'moderator',
                'last_name' => 'moderator',
                'role' => 'User::ROLE_MODERATOR',
                'email' => 'config(users.admin_email)',
                'password' => 'config(users.admin_password)'
            ],
            [
                'first_name' => 'moderator2',
                'last_name' => 'moderator2',
                'role' => 'User::ROLE_MODERATOR',
                'email' => 'config(users.admin_email)',
                'password' => 'config(users.admin_password)'
            ]
        ];

        foreach ($users as $value) {
            User::create($value);
        }
    }
}
