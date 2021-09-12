<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'ahmed',
            'email'=>'ahmed@app.com',
            'password'=>bcrypt('01114234116'),
        ]);
    }
}
