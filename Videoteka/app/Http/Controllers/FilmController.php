<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Medij;
use Illuminate\Http\Request;
use App\Models\Zanr;

class FilmController extends Controller
{
    public function index(){
        $film=Film::join('medij','film.broj_medija','=','medij.broj_medija')
        ->join('zanr','film.broj_zanra','=','zanr.broj_zanra')
        ->select(
            'film.id_filma',
            'film.naziv as naziv',
            'dostupneKolicine',
            'film.broj_medija',
            'film.broj_zanra',
            'medij.broj_medija as mi',
            'medij.naziv as nm',
             'zanr.broj_zanra as bz',
            'zanr.naziv as nz'
        )
        ->orderBy('id_filma')->get();
        return view("film.index",[
            'film'=>$film
        ]);
    }
    public function getCreateForm(){
        //trebam listu žanrova za select choice žanr
        $zanr=Zanr::orderBy('broj_zanra')->get();
        //trebam listu medija za select choice medija
        $medij=Medij::orderBy('broj_medija')->get();
        return view("film.create",
        [
            'zanr'=>$zanr,
            'medij'=>$medij
        ]);
    }
    public function saveData(Request $request){
            $validated=$request->validate([
                    "naziv"=>['required','max:50'],
                    "dostupneKolicine"=>['required','integer','min:1','max:50'],
                    "broj_medija"=>['required','integer'],
                    "broj_zanra"=>['required','integer'],
            ]);
            Film::create($validated);
            return redirect()->route("film.pocetna")->with('status',"Dodan novi film");
    }
    public function dohvatiFormuZaEdit(Film $film){
          //trebam listu žanrova za select choice žanr
        $zanr=Zanr::orderBy('broj_zanra')->get();
        //trebam listu medija za select choice medija
        $medij=Medij::orderBy('broj_medija')->get();
        return view("film.edit",
        ["film"=>$film,
        "zanr"=>$zanr,
        "medij"=>$medij]);
    }
    public function azuriraj(Request $request, Film $film){
       $validated=$request->validate([
             "naziv"=>['required','max:50'],
                    "dostupneKolicine"=>['required','integer','min:1','max:50'],
                    "broj_medija"=>['required','integer'],
                    "broj_zanra"=>['required','integer'],
       ]);
       $film->update($validated);
       return redirect()->route("film.pocetna")->with('status',"Film uspješno ažuriran.");
    }
    public function delete(Film $film){
        $film->delete();
        return redirect()->route("film.pocetna")->with('status',"Film uspješno izbrisan.");
    }
}
