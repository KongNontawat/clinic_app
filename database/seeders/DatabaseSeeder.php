<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PatientGroup;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PatientSeeder::class,
            DoctorSeeder::class,
            EmployeeSeeder::class,
            PatientGroupSeeder::class,
            DB::unprepared(file_get_contents(public_path("SQL\\provinces.sql")))
        ]);
    }
}
