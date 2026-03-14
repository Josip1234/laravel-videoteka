<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medij;

class MedijController extends Controller
{
    public function index(){
        $popisMedija=Medij::orderBy('broj_medija')->get();
        return view("medij.index",["medij"=>$popisMedija]);
    }
    public function create(){
        return view("medij.create");
    }
    public function spremanje(Request $request){
        $validated=$request->validate(
            [
            'naziv'=>['required','max:50'],
            ]);
        Medij::create($validated);
        return redirect()->route('medij.pocetna')->with('status','Uspješno spremljen novi žanr.');
    }
    public function editForm(Medij $medij){
        return view("medij.edit",[
            'medij'=>$medij
        ]);
    }
    public function azuriraj(Request $request,Medij $medij){
        $validated=$request->validate([
            'naziv'=>['required','max:50'],
        ]);
        $medij->update($validated);
        return redirect()->route('medij.pocetna')->with('status','Medij uspješno ažuriran.');
    }
    public function izbrisi(Medij $medij){
        $medij->delete();
        return redirect()->route('medij.pocetna')->with('status','Medij uspješno izbrisan.');
    }
}
