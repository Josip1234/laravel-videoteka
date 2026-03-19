<?php

namespace App\Http\Controllers;

use App\Models\ClanskaIskaznica;
use App\Models\Posudba;
use Illuminate\Http\Request;

class PosudbaController extends Controller
{
    public function index(ClanskaIskaznica $clanskaIskaznica){
        $posudbe=Posudba::with('popisposudjenih')->where("broj_iskaznice","=",$clanskaIskaznica->broj_iskaznice)->get();
       
        return view("posudba.index",[
            'clanska_iskaznica'=>$clanskaIskaznica,
            'posudbe'=>$posudbe,
        ]);
    }
    public function create(ClanskaIskaznica $clanskaIskaznica){
        $posudbe=Posudba::orderBy('brojPopisa')->get();
        return view("posudba.create",[
            'clanska_iskaznica'=>$clanskaIskaznica,
            'posudbe'=>$posudbe
        ]);
    }
    public function store(Request $request,ClanskaIskaznica $clanskaIskaznica){
      $validated=$request->validate([
            'broj_iskaznice'=>['required','string','max:20','min:5'],
            'zakasnina'=>['required','numeric'],
            'brojPopisa'=>['required','integer']
      ]);
      Posudba::create($validated);
      return redirect()->route("posudba.pocetna",$clanskaIskaznica)->with('status','Nova posudba uspješno dodana.');
    }
}
