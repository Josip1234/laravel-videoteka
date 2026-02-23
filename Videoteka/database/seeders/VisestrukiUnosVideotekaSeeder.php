<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Videoteka;

class VisestrukiUnosVideotekaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //kreiranje dodatnih seedera preko for petlje kreirati će se random vrijednosti za videoteku
          $faker=Faker::create("hr_HR");
        
          foreach (range(1,rand(1,$faker->randomNumber())) as $index) {
           Videoteka::updateOrCreate([
            //generiraj oib minimalni treba biti 1 sa deset nula maksimalni sve devetke
            "oib"=>$faker->realText(mt_rand(10000000000,99999999999)),
            "naziv"=>$faker->userName,
            "adresa"=>$faker->address,
        ]);
          };
    }
}
