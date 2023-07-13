<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables();
        $this->call(AdminSeeder::class);
        \App\Models\Shop::factory(5)->has(\App\Models\User::factory()->count(5))->create();
    }

    protected function truncateTables()
    {
        $tableNames = \Illuminate\Support\Facades\Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tableNames as $name) {
            if ($name != 'migrations')
                \Illuminate\Support\Facades\DB::table($name)->truncate();
        }
    }
}
