<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specs=[
            ['en'=>'Arabic','ar'=>'عربى'],
            ['en'=>'Science','ar'=>'علوم'],
            ['en'=>'Computer','ar'=>'حاسب الى'],
            ['en'=>'Mathimatics','ar'=>'رياضيات'],
        ];

        foreach ($specs as $spec) {
            Specialization::create([
                'Name'=>$spec,
            ]);
        }

    }
}
