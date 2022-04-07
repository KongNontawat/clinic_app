<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
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
                'name' => 'นาง ชนาธินาถ กิตติภัทรา',
                'email' => $email,
                'role' => 'doctor',
                'user_status' => 1,
                'user_image' => 'default_profile.png',
                'password' => bcrypt(123)
            ]);
            Doctor::create([
                'user_id' => $user->user_id,
                'title' => 'นาง',
                'fname' => 'ชนาธินาถ',
                'lname' => 'กิตติภัทรา',
                'nname' => 'นานา',
                'sex' => 'หญิง',
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-30 years'),
                'age' => $faker->numberBetween($min = 18, $max = 60),
                'email' => $email,
                'id_line' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'position' => 'ทันตแพทย์',
                'specialize' => 'ทันตแพทย์',
                'in_hospital' => '-',
                'aboutme' => '-',
                'image' => 'default_profile.png',
                'doctor_status' => 1
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
                'name' => 'นาย เศรษฐา จรัสวงศ์',
                'email' => $email,
                'role' => 'doctor',
                'user_status' => 1,
                'user_image' => 'default_profile.png',
                'password' => bcrypt(123)
            ]);
            Doctor::create([
                'user_id' => $user->user_id,
                'title' => 'นาย',
                'fname' => 'เศรษฐา',
                'lname' => 'จรัสวงศ์',
                'nname' => 'สอง',
                'sex' => 'ชาย',
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-20 years'),
                'age' => $faker->numberBetween($min = 18, $max = 60),
                'email' => $email,
                'id_line' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'position' => 'ศัลยแพทย์',
                'specialize' => 'ศัลยแพทย์',
                'in_hospital' => '-',
                'aboutme' => '-',
                'image' => 'default_profile.png',
                'doctor_status' => 1
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
                'name' => 'นาย ภูมิพัฒน์ คมคาย ',
                'email' => $email,
                'role' => 'doctor',
                'user_status' => 1,
                'user_image' => 'default_profile.png',
                'password' => bcrypt(123)
            ]);
            Doctor::create([
                'user_id' => $user->user_id,
                'title' => 'นาย',
                'fname' => 'ภูมิพัฒน์',
                'lname' => 'คมคาย',
                'nname' => 'คอยน์',
                'sex' => 'ชาย',
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-40 years'),
                'age' => $faker->numberBetween($min = 18, $max = 60),
                'email' => $email,
                'id_line' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'position' => 'ศัลยแพทย์',
                'specialize' => 'ศัลยแพทย์',
                'in_hospital' => '-',
                'aboutme' => '-',
                'image' => 'default_profile.png',
                'doctor_status' => 1
            ]);
        }
    }
}
