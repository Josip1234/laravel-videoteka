<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\ClanskaIskaznica;
use App\Models\Videoteka;
use Illuminate\Http\Request;

class ClanController extends Controller
{
    public function popis(Videoteka $videoteka,ClanskaIskaznica $clanskaIskaznica){
        $clanovi=Clan::orderBy("oib")->where()->get();
        return view("clan.index",[
            "videoteka"=>$videoteka,
            "naziv"=>$videoteka->naziv,
            "clanovi"=>$clanovi
        ]);
    }
}
