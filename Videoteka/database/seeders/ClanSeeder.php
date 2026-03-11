<?php

namespace Database\Seeders;

use App\Models\Clan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("hr_HR");
        Clan::create([
             "oib"=>rand(00000000001,99999999999),
             "ime"=>$faker->firstName,
             "prezime"=>$faker->lastName,
             "adresa"=>$faker->address,
             "email"=>$faker->email,
             "broj_telefona"=>$faker->phoneNumber,
             "spol"=>$faker->randomElement(["m","f"]),
             "datumRodjenja"=>$faker->date("Y-m-d","-18 years")
        ]);
    }
}
