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
        \App\Models\Item::factory(50)->create();
        // $this->truncateTables();
        // $this->call(AdminSeeder::class);
        // \App\Models\Shop::factory(5)
        //                     ->has(\App\Models\User::factory()->count(5))
        //                     ->has(\App\Models\Unit::factory()->count(5))
        //                     ->has(\App\Models\Category::factory()->count(5))
        //                     ->create();
    }

    protected function truncateTables()
    {
        $tableNames = \Illuminate\Support\Facades\Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        Schema::enableForeignKeyConstraints();
            foreach ($tableNames as $name) {
                if ($name != 'migrations' && $name != 'shops') {
                    \Illuminate\Support\Facades\DB::table($name)->truncate();
                }
            }
        Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('shops')->truncate();
    }
}
