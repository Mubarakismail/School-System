<?php

use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections=Section::all();
        $fkr = Faker::create();
        for ($i = 0; $i < rand(10, 30); $i++) {
            $name = $fkr->name;
            $section=$sections[rand(1,70)];
            Student::create([
                'Email' => $fkr->email,
                'Password' => Hash::make('01114234116'),
                'Name' => ['en' => $name, 'ar' => $name],
                'Nationality_id' => rand(1, 15),
                'Grade_id' => $section->Grade_id,
                'Classroom_id' =>$section->Class_id,
                'Section_id' => $section->id,
                'Parent_id' => rand(1, 10),
                'Blood_type_id' => rand(1, 8),
                'Birthday_Date' => $fkr->date('Y-m-d'),
                'Acadimic_year' => rand(2021, 2022),
                'Gender' => (rand(1, 2) == 1 ? 'male' : 'female'),
            ]);
        }
    }
}
