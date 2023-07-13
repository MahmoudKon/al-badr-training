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
        for($i=0 ; $i<=1000; $i++){
            User::create([
                'name'=>$faker->name,
                'password'=>'123456789',
                'email_verified_at' => now(),
                'email'=> $faker->email,
            ]);
        }
    }
}
