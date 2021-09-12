<?php

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

        Grade::create([
            'Name'=>['en'=>'nursery stage','ar'=>'مرحلة الحضانة'],
            'Notes'=>$faker->paragraph,
        ]);

        Grade::create([
            'Name'=>['en'=>'Primary stage','ar'=>'مرحلة الابتدائية'],
            'Notes'=>$faker->paragraph,
        ]);

        Grade::create([
            'Name'=>['en'=>'Preparatory stage','ar'=>'المرحلة الاعدادية'],
            'Notes'=>$faker->paragraph,
        ]);
        Grade::create([
            'Name'=>['en'=>'Secondary stage','ar'=>'مرحلة الثانوية'],
            'Notes'=>$faker->paragraph,
        ]);
    }
}
