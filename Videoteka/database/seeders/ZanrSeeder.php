<?php

namespace Database\Seeders;

use App\Models\Zanr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ZanrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("hr_HR");
        Zanr::updateOrCreate([
            'naziv'=>$faker->text(50),
        ]);
    }
}
