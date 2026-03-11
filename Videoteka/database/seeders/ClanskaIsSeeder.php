<?php

namespace Database\Seeders;

use App\Models\Clan;
use App\Models\ClanskaIskaznica;
use App\Models\Videoteka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClanskaIsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //inicijalizacija fakera
          $faker=Faker::create("hr_HR");
          //trebamo listu videoteka
          $listaVideoteka=Videoteka::orderBy('oib')->get();
          //trebamo broj zapisa videoteka
          $brojZapisaVideoteka=Videoteka::selectRaw('oib, count(*) as broj')->groupBy('oib')->get();
          //trebamo range oiba iz videoteke
          $rangeOib=rand(0,$brojZapisaVideoteka[0]['broj']);
          //dohvatimo oib iz liste
          $oib=$listaVideoteka[$rangeOib]["oib"];
          //trebamo listu članova
          $listaClanova=Clan::orderBy('oib')->get();
          //trebamo broj zapisa članova
          $brojZapisaClanova=Videoteka::selectRaw('oib, count(*) as broj')->groupBy('oib')->get();
          //trebamo range oiba iz clanova
          $rangeOC=rand(0,$brojZapisaClanova[0]['broj']);
          //dohvatimo oib iz liste
          $oibC=$listaClanova[$rangeOC]["oib"];
          ClanskaIskaznica::updateOrCreate([
                
                    'oib_videoteke'=>$oib,
                    'broj_iskaznice'=>rand(00000000001,99999999999),
                    'oib_clana'=>$oibC,
                    'datum_uclanjenja'=>$faker->date(),
                
        ]);
    }
}
