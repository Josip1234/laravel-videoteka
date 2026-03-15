<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zanr;

class ZanrController extends Controller
{
    public function index(){
        $zanrovi=Zanr::orderBy("broj_zanra")->get();
        return view("zanr.index",
        ['zanrovi'=>$zanrovi]);
    }
    public function create(){
        return view("zanr.create");
    }
    public function save(Request $request){
        $validated=$request->validate([
            'naziv'=>['required','max:50'],
        ]);
        Zanr::create($validated);
        return redirect()->route("zanr.pocetna")->with('status','Novi žanr uspješno spremljen.');
    }
    public function edit(Zanr $zanr){
        return view("zanr.edit",['zanr'=>$zanr] );
    }
    public function update(Request $request, Zanr $zanr){
        $validated=$request->validate([
             'naziv'=>['required','max:50'],
        ]);
        $zanr->update($validated);
        return redirect()->route("zanr.pocetna")->with('status','Uspješno ažuriran žanr.');
    }
    public function delete(Zanr $zanr){
        $zanr->delete();
        return redirect()->route("zanr.pocetna")->with('status','Žanr uspješno izbrisan');
    }
}
