<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\PopisPosudjenih;
use Illuminate\Http\Request;


class PopisController extends Controller
{
    //dohvaćanje početne forme sa listom popisa 
    public function index(){
        $popis=PopisPosudjenih::orderBy('brojPopisa')->get();
        return view("popis_posudjenih.index",[
            'popis'=>$popis
        ]);
    }
    //dohvaćanje forme za kreiranje novog popisa 
    //trebamo listu filmova kao select choice 
    public function create(){
        $filmovi=Film::orderBy('id_filma')->get();
        return view('popis_posudjenih.create',
        ['filmovi'=>$filmovi]);
    }
    //spremanje popisa
    public function store(Request $request){
        $validated=$request->validate([
            'datum_posudbe'=>['required','date','after:yesterday'],
            'datum_vracanja'=>['required','date'],
            'id_filma'=>['required','integer']
        ]);
        PopisPosudjenih::create($validated);
        return redirect()->route("popis_posudjenih.pocetna")->with('status','Novi popis uspješno unešen.');
    }
    //dohvaćanje forme za editiranje 
    public function edit(PopisPosudjenih $popis){
        $filmovi=Film::orderBy('id_filma')->get();
        return view('popis_posudjenih.edit',[
            'popis'=>$popis,
            'filmovi'=>$filmovi
        ]);
    }
    //spremanje podataka 
    public function update(Request $request, PopisPosudjenih $popis){
        $validated=$request->validate([
                 'datum_posudbe'=>['required','date','after:yesterday'],
            'datum_vracanja'=>['required','date'],
            'id_filma'=>['required','integer']
        ]);
        $popis->update($validated);
        return redirect()->route('popis_posudjenih.pocetna')->with('status','Popis uspješno ažuriran.');
    }
    //brisanje popisa
    public function delete(PopisPosudjenih $popis){
        $popis->delete();
        return redirect()->route('popis_posudjenih.pocetna')->with('status','Popis uspješno izbrisan');
    }

}
