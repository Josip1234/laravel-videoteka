<?php

namespace Database\Seeders;

use App\Models\ClanskaIskaznica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClanskaIsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          ClanskaIskaznica::updateOrCreate([
                
                    'oib_videoteke'=>"14256985555",
                    'broj_iskaznice'=>"1",
                    'oib_clana'=>"14256987444",
                    'datum_uclanjenja'=>"2026-11-11",
                
        ]);
    }
}
