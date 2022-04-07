<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PatientSeeder extends Seeder
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
            $patient = Patient::create([
                'opd_id' => 'HN000020',
                'id_card' => $faker->numberBetween($min = 1835397638373, $max = 9935397638373),
                'group_id' => $faker->numberBetween($min = 1, $max = 3),
                'title' => $faker->randomElement($array = array ('นาย','นาง','นางสาว')),
                'fname' => 'ปองพล',
                'lname' => 'สุขประเสริญ',
                'nname' => 'คริสต์',
                'sex' => $faker->randomElement($array = array ('ชาย','หญิง')),
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-30 years'),
                'age' => $faker->numberBetween($min = 18, $max = 60),
                'nationality' => 'ไทย',
                'race' => 'ไทย',
                'religion' => 'พุทธ',
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'image' => 'default_profile.png',
                'patient_status' => 1
            ]);
            DB::table('patient_medical_info')->insert([
                'patient_id' => $patient->patient_id,
                'inquirer_id' => 1,
            ]);
            DB::table('patient_emc')->insert([
                'patient_id' => $patient->patient_id,
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
            $patient = Patient::create([
                'opd_id' => 'HN000021',
                'id_card' => $faker->ean13,
                'group_id' => $faker->numberBetween($min = 1, $max = 3),
                'title' => $faker->randomElement($array = array ('นาย','นาง','นางสาว')),
                'fname' => 'ณัฏฐกิตติ์ ',
                'lname' => 'นันทพิวัฒน์',
                'nname' => 'ซัน',
                'sex' => $faker->randomElement($array = array ('ชาย','หญิง')),
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-30 years'),
                'age' => $faker->numberBetween($min = 18, $max = 60),
                'nationality' => 'ไทย',
                'race' => 'ไทย',
                'religion' => 'พุทธ',
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'image' => 'default_profile.png',
                'patient_status' => 1
            ]);
            DB::table('patient_medical_info')->insert([
                'patient_id' => $patient->patient_id,
                'inquirer_id' => 1,
            ]);
            DB::table('patient_emc')->insert([
                'patient_id' => $patient->patient_id,
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
            $patient = Patient::create([
                'opd_id' => 'HN000022',
                'id_card' => $faker->numberBetween($min = 1835397638373, $max = 9935397638373),
                'group_id' => $faker->numberBetween($min = 1, $max = 3),
                'title' => $faker->randomElement($array = array ('นาย','นาง','นางสาว')),
                'fname' => 'จารวี',
                'lname' => 'สีสะอาด',
                'nname' => 'ปัญ',
                'sex' => $faker->randomElement($array = array ('ชาย','หญิง')),
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-30 years'),
                'age' => $faker->numberBetween($min = 18, $max = 60),
                'nationality' => 'ไทย',
                'race' => 'ไทย',
                'religion' => 'พุทธ',
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'image' => 'default_profile.png',
                'patient_status' => 1
            ]);
            DB::table('patient_medical_info')->insert([
                'patient_id' => $patient->patient_id,
                'inquirer_id' => 1,
            ]);
            DB::table('patient_emc')->insert([
                'patient_id' => $patient->patient_id,
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
            $patient = Patient::create([
                'opd_id' => 'HN000023',
                'id_card' => $faker->ean13,
                'group_id' => $faker->numberBetween($min = 1, $max = 3),
                'title' => $faker->randomElement($array = array ('นาย','นาง','นางสาว')),
                'fname' => 'ธนิสรา ',
                'lname' => 'ทรัพย์มา',
                'nname' => 'เฟิร์น',
                'sex' => $faker->randomElement($array = array ('ชาย','หญิง')),
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-20 years'),
                'age' => $faker->numberBetween($min = 18, $max = 40),
                'nationality' => 'ไทย',
                'race' => 'ไทย',
                'religion' => 'พุทธ',
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'image' => 'default_profile.png',
                'patient_status' => 1
            ]);
            DB::table('patient_medical_info')->insert([
                'patient_id' => $patient->patient_id,
                'inquirer_id' => 1,
            ]);
            DB::table('patient_emc')->insert([
                'patient_id' => $patient->patient_id,
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
            $patient = Patient::create([
                'opd_id' => 'HN000024',
                'id_card' => $faker->ean13,
                'group_id' => $faker->numberBetween($min = 1, $max = 3),
                'title' => $faker->randomElement($array = array ('นาย','นาง','นางสาว')),
                'fname' => 'ธนิสร ',
                'lname' => 'ศรีสดุดี',
                'nname' => 'น้อย',
                'sex' => $faker->randomElement($array = array ('ชาย','หญิง')),
                'birthdate' => $faker->date($format = 'd-m-Y', $max = '-20 years'),
                'age' => $faker->numberBetween($min = 18, $max = 40),
                'nationality' => 'ไทย',
                'race' => 'ไทย',
                'religion' => 'พุทธ',
                'phone' => $faker->phoneNumber,
                'address_id' => $address_info,
                'image' => 'default_profile.png',
                'patient_status' => 1
            ]);
            DB::table('patient_medical_info')->insert([
                'patient_id' => $patient->patient_id,
                'inquirer_id' => 1,
            ]);
            DB::table('patient_emc')->insert([
                'patient_id' => $patient->patient_id,
            ]);
        }
    }
}
