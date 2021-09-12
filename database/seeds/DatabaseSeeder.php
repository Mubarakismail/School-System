<?php

use Illuminate\Database\Seeder;

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
            UsersSeeder::class, GradesSeeder::class,
            ClassesSeeder::class, SectionsSeeder::class,
            NationalitySeeder::class, ReliginSeeder::class,
            BloodSeeder::class, SpecializationsSeeder::class,
            ParentSeeder::class, TeacherSeeder::class,
            StudentSeeder::class
        ]);
    }
}
