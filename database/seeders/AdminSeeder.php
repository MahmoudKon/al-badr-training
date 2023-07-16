<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shop = Shop::create([
            'name' => 'البدر',
            'address' => 'مركز سمنود',
            'phone' => '123123123',
        ]);

        User::create([
            'shop_id'           => $shop->id,
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'          => 123
        ]);

        \App\Models\User::factory(5)->create(['shop_id' => $shop->id]);
        \App\Models\Unit::factory(5)->create(['shop_id' => $shop->id]);
        \App\Models\Category::factory(5)->create(['shop_id' => $shop->id]);
    }
}
