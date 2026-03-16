<?php

namespace App\Http\Controllers;

use App\Models\VrstaCjenika;
use Illuminate\Http\Request;

class VrstaCjenikaController extends Controller
{
    public function getIndex(){
        $vrsta=VrstaCjenika::orderBy('id_vrste_cjenika')->get();
        return view("vrsta.index",[
            "vrsta"=>$vrsta,
        ]);
    }
    public function getCreateForm(){
        return view("vrsta.create");
    }
    public function save(Request $request){
        $validated=$request->validate([
                "naziv"=>["required","max:50"],
                "opis"=>["required"]
        ]);
        VrstaCjenika::create($validated);
        return redirect()->route("vrsta.pocetna")->with('status','Unesen novi cjenik');
    }
    public function getEdit(VrstaCjenika $vrsta){
        return view("vrsta.edit",[
            'vrsta'=>$vrsta
        ]);
    }
    public function update(Request $request,VrstaCjenika $vrsta){
        $validated=$request->validate([
            "naziv"=>["required","max:50"],
            "opis"=>["required"]
        ]);
        $vrsta->update($validated);
        return redirect()->route("vrsta.pocetna")->with('status','Vrsta cijenika ažurirana.');
    }
    public function delete(VrstaCjenika $vrsta){
        $vrsta->delete();
        return redirect()->route("vrsta.pocetna")->with('status',"Vrsta cijenika uspješno izbrisana");
    }
}
