<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables();
        $this->call(AdminSeeder::class);
        \App\Models\Shop::factory(5)
                            ->has(\App\Models\User::factory()->count(5))
                            ->has(\App\Models\Unit::factory()->count(5))
                            ->has(\App\Models\Category::factory()->count(5))
                            ->has(\App\Models\Item::factory()->count(10))
                            ->has(\App\Models\Store::factory()->count(5))
                            ->create();
        // Getting all items and saving them to variable is not too good idea.
        // Instead, get count of rows.
        $itemsCount = App\Models\Item::count();

        // Populate the pivot table
        // App\Models\Store::all()->each(function ($store) use ($itemsCount) {
        //     $store->items()->attach(
        //         App\Models\Item::all()->random(rand(1, $itemsCount))->pluck('id')->toArray()
        //     );
        // });
    }

    protected function truncateTables()
    {
        $tableNames = \Illuminate\Support\Facades\Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tableNames as $name) {
            if ($name != 'migrations' && $name != 'shops') {
                Schema::enableForeignKeyConstraints();
                    \Illuminate\Support\Facades\DB::table($name)->truncate();
                Schema::disableForeignKeyConstraints();
            }
        }
        \Illuminate\Support\Facades\DB::table('shops')->truncate();
    }
}
