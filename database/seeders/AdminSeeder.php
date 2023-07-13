<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        User::create([
            // 'shop_id'           => 1,
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
