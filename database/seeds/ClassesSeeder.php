<?php

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([
            'Name' => ['en' => 'kg' . (1), 'ar' => 'مرحلة رياض الاطفال الاولى'],
            'Grade_id' => 1,
        ]);
        Classroom::create([
            'Name' => ['en' => 'kg' . (2), 'ar' => 'مرحلة رياض الاطفال الثانية'],
            'Grade_id' => 1,
        ]);
        Classroom::create([
            'Name' => ['en' => 'first level', 'ar' => 'المستوى الاول'],
            'Grade_id' => 2,
        ]);
        Classroom::create([
            'Name' => ['en' => 'second level', 'ar' => 'المستوى الثانى'],
            'Grade_id' => 2,
        ]);
        Classroom::create([
            'Name' => ['en' => 'third level', 'ar' => 'المستوى الثالث'],
            'Grade_id' => 2,
        ]);
        Classroom::create([
            'Name' => ['en' => 'fourth level', 'ar' => 'المستوى الرابع'],
            'Grade_id' => 2,
        ]);
        Classroom::create([
            'Name' => ['en' => 'fifth level', 'ar' => 'المستوى الخامس'],
            'Grade_id' => 2,
        ]);
        Classroom::create([
            'Name' => ['en' => 'sixth level', 'ar' => 'المستوى السادس'],
            'Grade_id' => 2,
        ]);
        Classroom::create([
            'Name' => ['en' => 'first level', 'ar' => 'المستوى الاول'],
            'Grade_id' => 3,
        ]);
        Classroom::create([
            'Name' => ['en' => 'second level', 'ar' => 'المستوى الثانى'],
            'Grade_id' => 3,
        ]);
        Classroom::create([
            'Name' => ['en' => 'third level', 'ar' => 'المستوى الثالث'],
            'Grade_id' => 3,
        ]);
        Classroom::create([
            'Name' => ['en' => 'first level', 'ar' => 'المستوى الاول'],
            'Grade_id' => 4,
        ]);
        Classroom::create([
            'Name' => ['en' => 'second level', 'ar' => 'المستوى الثانى'],
            'Grade_id' => 4,
        ]);
        Classroom::create([
            'Name' => ['en' => 'third level', 'ar' => 'المستوى الثالث'],
            'Grade_id' => 4,
        ]);
    }
}
