<?php

use App\Models\BloodType;
use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bgs = array('O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-');

        foreach($bgs as  $bg){
            BloodType::create(['Name' => $bg]);
        }
    }
}
