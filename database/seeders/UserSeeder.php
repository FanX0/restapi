<?php

namespace Database\Seeders;

use App\Models\Role;
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
        

        collect([
        [
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin123'),
        ],
        [
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('user123'),
        ],
        [
            'name' => 'asep',
            'email' => 'asep@test.com',
            'password' => bcrypt('asep123'),
        ],
        ])->each(function ($user) {
            User::factory()->create($user);
        });

        collect(['admin','moderator'])->each(fn($role) => Role::create(
        [
            'name'=> $role
        ]
        ));

        User::find(1)->roles()->attach([1]);
        User::find(2)->roles()->attach([2]);
    }
}