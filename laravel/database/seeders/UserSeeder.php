<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect([
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'User 4',
                'email' => 'user4@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'User 5',
                'email' => 'user5@gmail.com',
                'password' => '12345678'
            ]
        ]);

        $users->each(function($user){
            User::insert($user);
        });
    }
}
