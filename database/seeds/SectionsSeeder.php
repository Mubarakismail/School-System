<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // primary stage
        for ($i = 0; $i < 6; $i++) {

            for ($j = 0; $j < 6; $j++) {
                Section::create([
                    'Name_section' => ['en' => 'class ' .  chr($i + 65) . ($j + 1), 'ar' => 'فصل'],
                    'Grade_id' => 2,
                    'Class_id' => $i + 3,
                    'Status' => rand(1, 2),
                ]);
            }
        }
        // Preparatory Stage
        for ($i = 0; $i < 3; $i++) {

            for ($j = 0; $j < 6; $j++) {
                Section::create([
                    'Name_section' => ['en' => 'class ' . chr($i + 65) . ($j + 1), 'ar' => 'فصل'],
                    'Grade_id' => 3,
                    'Class_id' => $i + 9,
                    'Status' => rand(1, 2),
                ]);
            }
        }
        // Secondary Stage
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 6; $j++) {
                Section::create([
                    'Name_section' => ['en' => 'class ' . chr($i + 65) . ($j + 1), 'ar' => 'فصل'],
                    'Grade_id' => 4,
                    'Class_id' => $i + 12,
                    'Status' => rand(1, 2),
                ]);
            }
        }
    }
}
