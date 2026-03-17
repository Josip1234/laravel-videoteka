<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("hr_HR");
        Film::updateOrCreate([
            "id_filma"=>$faker->unique()->randomDigit(),
            "naziv"=>$faker->unique()->text(50),
            "dostupneKolicine"=>$faker->randomDigit(),
            "broj_medija"=>1,
            "broj_zanra"=>6
        ]);
    }
}
