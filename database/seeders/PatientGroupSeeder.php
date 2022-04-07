<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patient_group')->insert([
            'group_name'=>'normal',
            'group_detail'=>'normal'
        ]);
        DB::table('patient_group')->insert([
            'group_name'=>'vip1',
            'group_detail'=>'vip1'
        ]);
        DB::table('patient_group')->insert([
            'group_name'=>'old member',
            'group_detail'=>'old member'
        ]);
    }
}
