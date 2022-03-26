<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        ini_set('memory_limit', '-1');

        DB::unprepared(file_get_contents(public_path("SQL\\thailand-provinces\\provinces.sql")));

        $this->command->info('Country table seeded!');
        // User::factory(10)->create();
    }
}
