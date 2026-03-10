<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\ClanskaIskaznica;
use App\Models\Videoteka;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClanskaIskaznicaController extends Controller
{
    public function getClanskaIndex(Videoteka $videoteka){
        $clanska=ClanskaIskaznica::orderBy('broj_iskaznice')->where("oib_videoteke","=",$videoteka->oib)->get();
        return view('clanska_iskaznica.index',[
            "clanska"=>$clanska,
            "naziv"=>$videoteka->naziv,
            "videoteka"=>$videoteka,
        ]);
    }
    public function novi_clan(Videoteka $videoteka){
        //trebamo listu članova iz kojeg ćemo selektirati korisnike
        //nismo još napravili 
        //trebamo query gdje će izlistati članove a koji nisu već upisani
        //query bi bio ovakav a trebamo eager loading 
        //ovo je query 
        //SELECT c.oib FROM clanska_iskaznica cl right join clan c on cl.oib_clana=c.oib where cl.oib_videoteke is null
        //to je popis svih članova koji nisu upisani u videoteku
        //jedan član može biti učlanjen u više videoteka oib člana se može ponavljati 
        //ali za različitu videoteku svi članovi se zapravo mogu ispisivati za sve videoteke osim
        //onih koji su već članovi u toj videoteci
        //query ispiši sve članove koji nisu jednaki tom oibu videoteke
        //SELECT c.oib FROM clanska_iskaznica cl right join clan c on cl.oib_clana=c.oib where cl.oib_videoteke != '14256985555'
        //možda bi trebali ukloniti datum ispisivanja biti će jednostavnije da 
        //se ukloni član te videoteke iz zapisa učlanjenih. 
        //nećemo spremati history tko je bio upisan u videoteci 
        //trebam maknuti i unique key 
        $clanovi=ClanskaIskaznica::rightjoin('clan','clanska_iskaznica.oib_clana','=','clan.oib')
             ->select('clan.oib','clan.ime','clan.prezime')->where('oib_videoteke','!=',$videoteka->oib) 
            ->get();
        return view('clanska_iskaznica.create',[
            "videoteka"=>$videoteka,
            "naziv"=>$videoteka->naziv,
            "clanovi"=>json_decode($clanovi,true)
        ]);
    }
    public function spremi(Request $request,Videoteka $videoteka){
            $validated=$request->validate([
                'broj_iskaznice'=>['required','string','max:20'],
                'oib_videoteke'=>['required','string','min:11','max:11','digits_between:11,11'],
                //trebam maknuti unique key za oib člana što ako korisnik ima iskaznice i za druge videoteke?
                'oib_clana'=>['required','string','min:11','max:11','digits_between:11,11'],
                'datum_uclanjenja'=>['required','date'],
            ]);
            ClanskaIskaznica::create($validated);
            return redirect()->route("clanska_iskaznica.pocetna",$videoteka)->with('status','Novi član uspješno dodan.');
    }
    public function azuriranje(Request $request, Videoteka $videoteka, ClanskaIskaznica $clanska_iskaznica){
        return view("clanska_iskaznica.edit",[
            "naziv"=>$videoteka->naziv,
            "videoteka"=>$videoteka,
            "clanovi"=>$clanska_iskaznica
        ]);
    }
}
