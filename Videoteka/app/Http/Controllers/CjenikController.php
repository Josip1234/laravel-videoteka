<?php

namespace App\Http\Controllers;

use App\Models\Cjenik;
use App\Models\Film;
use App\Models\Videoteka;
use App\Models\VrstaCjenika;
use Illuminate\Http\Request;

class CjenikController extends Controller
{
    public function index(){
        $cjenici=Cjenik::join('videoteka','cjenik.oib_videoteke','=','videoteka.oib')->
        join('vrsta_cjenika','cjenik.id_vrste_cjenika','=','vrsta_cjenika.id_vrste_cjenika')->
        join('film','cjenik.id_filma','=','film.id_filma')->
        select('cjenik.id_cjenika','cjenik.id_filma','cjenik.oib_videoteke',
        'cjenik.cijena_filma','cjenik.id_vrste_cjenika',
        'videoteka.naziv as videoteka_naziv',
        'vrsta_cjenika.naziv as naziv_vrste_cjenika',
        'film.naziv as naziv_filma')->get();
       
        return view("cjenik.index",
        [
            'cjenik'=>$cjenici,
        ]);
    }
    public function getCreateForm(Videoteka $videoteka){
        //za odabir filmova u obliku select choice-a
        $filmovi=Film::orderBy('id_filma')->get();
        $vrsta=VrstaCjenika::orderBy('id_vrste_cjenika')->get();
        return view("cjenik.create",
        [
            'filmovi'=>$filmovi,
            'videoteka'=>$videoteka,
            'vrsta'=>$vrsta
        ]);
    }
    public function saveData(Request $request){
        $validated=$request->validate([
                "id_filma"=>['required','integer'],
                "oib_videoteke"=>['required','digits_between:11,11'],
                "cijena_filma"=>['required','numeric'],
                "id_vrste_cjenika"=>['required','integer']
        ]);
        Cjenik::create($validated);
        return redirect()->route("cjenik.pocetna")->with('status','Napravljen novi cjenik.');

    }
    public function edit(Videoteka $videoteka,Cjenik $cjenik){
            $filmovi=Film::orderBy('id_filma')->get();
        $vrsta=VrstaCjenika::orderBy('id_vrste_cjenika')->get();
      
        return view("cjenik.edit",[
            "cjenik"=>$cjenik,
            "filmovi"=>$filmovi,
            "vrsta"=>$vrsta,
            "videoteka"=>$videoteka
        ]);
    }
}
