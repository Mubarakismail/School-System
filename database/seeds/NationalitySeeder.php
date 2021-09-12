<?php

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationalites = [
            ['en' => 'Saudi', 'ar' => 'السعودية'],
            ['en' => 'Jordanian', 'ar' => 'الاردنية'],
            ['en' => 'Egyptian', 'ar' => 'المصرية'],
            ['en' => 'Qatari', 'ar' => 'القطرية'],
            ['en' => 'Iraqi', 'ar' => 'العراقية'],
            ['en' => 'Omani', 'ar' => 'العمانية'],
            ['en' => 'Sudanese', 'ar' => 'السودانية'],
            ['en' => 'Libyan', 'ar' => 'الليبية'],
            ['en' => 'Yameni', 'ar' => 'اليمنية'],
            ['en' => 'Kuwaiti', 'ar' => 'الكويتية'],
            ['en' => 'Emirati', 'ar' => 'الاماراتية'],
            ['en' => 'Algerian', 'ar' => 'الجزائرية'],
            ['en' => 'Syrian', 'ar' => 'السورية'],
            ['en' => 'Moroccan','ar' => 'المغربية'],
            ['en' => 'Plastinian','ar' => 'الفلسطينية']
        ];
        foreach ($nationalites as $nation) {
            Nationality::create([
                'Name' => $nation,
            ]);
        }
    }
}
