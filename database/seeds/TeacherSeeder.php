<?php

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fkr = Faker::create();
        for ($i = 0; $i < rand(10, 30); $i++) {
            $name = $fkr->name;
            Teacher::create([
                'Email' => $fkr->email,
                'Password' => Hash::make('01114234116'),
                'Name' => ['en' => $name, 'ar' => $name],
                'Specialization_id' => rand(1, 4),
                'Joining_Date' => $fkr->date('Y-m-d'),
                'Address' => $fkr->address,
                'Gender' => (rand(1, 2) == 1 ? 'male' : 'female'),
            ]);
        }
    }
}
