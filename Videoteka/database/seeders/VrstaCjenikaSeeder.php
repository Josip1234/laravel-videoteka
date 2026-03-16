<?php

namespace Database\Seeders;

use App\Models\VrstaCjenika;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VrstaCjenikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("hr_HR");
        VrstaCjenika::updateOrCreate([
            'naziv'=>$faker->word,
            'opis'=>$faker->randomHtml
        ]);
        VrstaCjenika::updateOrCreate([
            'naziv'=>$faker->domainName,
            'opis'=>$faker->address
        ]);
    }
}
