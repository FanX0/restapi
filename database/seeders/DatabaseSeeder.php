<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\ShippingAddress;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin321')
        ]);

        User::factory(10)
            ->has(Cart::factory()->count(3)) // Mengaitkan 3 keranjang dengan setiap pengguna yang dibuat
            ->has(ShippingAddress::factory())
            ->has(Transaction::factory())
            ->create();

       
    }
}
