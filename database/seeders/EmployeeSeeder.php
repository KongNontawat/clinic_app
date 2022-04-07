<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create(); 
        {
            $address_info = DB::table('address_info')->insertGetId([
                'address' => 'Overflow เลขที่ 555/49 ถนนกสิกรทุ่งสร้าง',
                'subdistrict_id' => 400101,
                'district_id' => 393,
                'province_id' => 28,
                'zip_code' => '40000',
                'country' => 'ไทย'
            ]);
            $email=$faker->email;
            $user = User::create([
                'name' => 'นาง ธมน นันทพินิจ',
                'email' => $email,
                'role' => 'employee',
                'user_status' => 1,
                'user_image' => 'default_profile.png',
                'password' => bcrypt(123)
            ]);
            Employee::create([
                'user_id' => $user->user_id,
                'title' => 'นาง',
                'fname' => 'ธมน',
                'lname' => 'นันทพินิจ',
                'nname' => 'แบมบี้',
                'sex' => 'หญิง',
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-20 years'),
                'age' => $faker->numberBetween($min = 18, $max = 30),
                'email' => $email,
                'id_line' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'position' => 'พนักงาน',
                'aboutme' => '-',
                'image' => 'default_profile.png',
                'employee_status' => 1
            ]);
        }
        {
            $address_info = DB::table('address_info')->insertGetId([
                'address' => 'Overflow เลขที่ 555/49 ถนนกสิกรทุ่งสร้าง',
                'subdistrict_id' => 400101,
                'district_id' => 393,
                'province_id' => 28,
                'zip_code' => '40000',
                'country' => 'ไทย'
            ]);
            $email=$faker->email;
            $user = User::create([
                'name' => 'นาย พงศภัค ทรัพย์ธารา',
                'email' => $email,
                'role' => 'employee',
                'user_status' => 1,
                'user_image' => 'default_profile.png',
                'password' => bcrypt(123)
            ]);
            Employee::create([
                'user_id' => $user->user_id,
                'title' => 'นาย',
                'fname' => 'พงศภัค',
                'lname' => 'ทรัพย์ธารา',
                'nname' => 'แฟรงค์',
                'sex' => 'ชาย',
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-30 years'),
                'age' => $faker->numberBetween($min = 18, $max = 40),
                'email' => $email,
                'id_line' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'position' => 'ผู้ช่วยพยาบาล',
                'aboutme' => '-',
                'image' => 'default_profile.png',
                'employee_status' => 1
            ]);
        }
        {
            $address_info = DB::table('address_info')->insertGetId([
                'address' => 'Overflow เลขที่ 555/49 ถนนกสิกรทุ่งสร้าง',
                'subdistrict_id' => 400101,
                'district_id' => 393,
                'province_id' => 28,
                'zip_code' => '40000',
                'country' => 'ไทย'
            ]);
            $email=$faker->email;
            $user = User::create([
                'name' => 'นาง นิษฐา พัฒน์ธนโกศล',
                'email' => $email,
                'role' => 'employee',
                'user_status' => 1,
                'user_image' => 'default_profile.png',
                'password' => bcrypt(123)
            ]);
            Employee::create([
                'user_id' => $user->user_id,
                'title' => 'นาง',
                'fname' => 'นิษฐา',
                'lname' => 'พัฒน์ธนโกศล',
                'nname' => 'จินนี่',
                'sex' => 'หญิง',
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-30 years'),
                'age' => $faker->numberBetween($min = 18, $max = 40),
                'email' => $email,
                'id_line' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'position' => 'แม่บ้าน',
                'aboutme' => '-',
                'image' => 'default_profile.png',
                'employee_status' => 1
            ]);
        }
    }
}
