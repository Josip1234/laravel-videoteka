<?php

namespace Database\Seeders;

use App\Models\Videoteka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VideotekaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker=Faker::create();
        $randomDigit=self::create_random_digit(0,11);
      
        Videoteka::updateOrCreate([
            "oib"=>$randomDigit,
            "naziv"=>$faker->userName,
            "adresa"=>$faker->address,
        ]);
          Videoteka::updateOrCreate([
            "oib"=>'14256985555',
            "naziv"=>'Pink Panther',
            "adresa"=>'Trg Svetog Trojstva 11 34000 Požega Republika Hrvatska',
        ]);
        $randomDigit=self::create_random_digit(0,11);
          Videoteka::updateOrCreate([
            "oib"=>$randomDigit,
            "naziv"=>$faker->company,
            "adresa"=>$faker->address,
        ]);
        
        
    }
    private function create_random_digit(int $start,int $end):string{
        $faker=Faker::create();
        $stringValue="";
        for($i=$start;$i<$end;$i++){
            $stringValue.=$faker->randomDigitNotNull();
        }
        return $stringValue;
    }
}
