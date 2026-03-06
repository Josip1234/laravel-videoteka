<?php

namespace App\Http\Controllers;

use App\Models\ClanskaIskaznica;
use App\Models\Videoteka;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClanskaIskaznicaController extends Controller
{
    public function getClanskaIndex(Request $request, Videoteka $videoteka){
        $clanska=ClanskaIskaznica::orderBy('broj_iskaznice')->where("oib_videoteke","=",$videoteka->oib)->get();
        return view('clanska_iskaznica.index',[
            "clanska"=>$clanska,
            "naziv"=>$videoteka->naziv
        ]);
    }
}
