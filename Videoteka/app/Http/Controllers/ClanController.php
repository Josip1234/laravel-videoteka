<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\ClanskaIskaznica;
use App\Models\Videoteka;
use Illuminate\Http\Request;

class ClanController extends Controller
{
    public function detalji(Request $request,Videoteka $videoteka,ClanskaIskaznica $clanskaIskaznica){
        $clanovi=Clan::where('oib','=',$clanskaIskaznica->oib_clana)->get();
      
        return view("clan.detalji",[
            "videoteka"=>$videoteka,
            "naziv"=>$videoteka->naziv,
            "clanovi"=>$clanovi[0]
        ]);
    }
}
