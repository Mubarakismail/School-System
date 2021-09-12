<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReliginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'Name'=>['ar'=>'الاسلامية','en'=>'Muslim'],
        ]);
        Religion::create([
            'Name'=>['ar'=>'المسيحية','en'=>'Christianity'],
        ]);
    }
}
