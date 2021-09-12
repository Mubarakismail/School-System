<?php

use App\Models\My_Parent;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < rand(10, 20); $i++) {
            $Name_Father = $faker->name('male');
            $Job_Father = $faker->jobTitle;
            $Name_Mother = $faker->name('female');
            $Job_Mother = $faker->jobTitle;
            My_Parent::create([
                'Email' => $faker->email,
                'Password' => Hash::make('01114234116'),
                'Name_Father' => ['en' => $Name_Father, 'ar' => $Name_Father],
                'National_ID_Father' => '29809172402413',
                'Passport_ID_Father' => '29809172402413',
                'Phone_Father' => '01114234116',
                'Job_Father' => ['en' => $Job_Father, 'ar' => $Job_Father],
                'Nationality_Father_id' => rand(1, 15),
                'Blood_Type_Father_id' => rand(1, 8),
                'Religion_Father_id' => rand(1, 2),
                'Address_Father' => 'Egypt-minia-' . $faker->city,
                'Name_Mother' => ['en' => $Name_Mother, 'ar' => $Name_Mother],
                'National_ID_Mother' => '29809172402413',
                'Passport_ID_Mother' => '29809172402413',
                'Phone_Mother' => '01114234116',
                'Job_Mother' => ['en' => $Job_Mother, 'ar' => $Job_Mother],
                'Nationality_Mother_id' => rand(1, 15),
                'Blood_Type_Mother_id' => rand(1, 8),
                'Religion_Mother_id' => rand(1, 2),
                'Address_Mother' => 'Egypt-minia-' . $faker->city,
            ]);
        }
    }
}
