<?php

namespace App\Http\Controllers;

use App\Models\ClanskaIskaznica;
use App\Models\PopisPosudjenih;
use App\Models\Posudba;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

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
        $popis=PopisPosudjenih::orderBy('brojPopisa')->get();
        return view("posudba.create",[
            'clanska_iskaznica'=>$clanskaIskaznica,
            'popis'=>$popis
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
    public function delete(ClanskaIskaznica $clanskaIskaznica, Posudba $posudba){
        $posudba->delete();
        return redirect()->route("posudba.pocetna",$clanskaIskaznica)->with('status','Posudba obrisana');
    }

    public function edit(ClanskaIskaznica $clanskaIskaznica, Posudba $posudba){
             $popis=PopisPosudjenih::orderBy('brojPopisa')->get();
        return view("posudba.edit",[
            'clanska_iskaznica'=>$clanskaIskaznica,
            'popis'=>$popis,
            'posudba'=>$posudba
        ]);
    }

        public function update(Request $request,ClanskaIskaznica $clanskaIskaznica, Posudba $posudba){
      $validated=$request->validate([
            'broj_iskaznice'=>['required','string','max:20','min:5'],
            'zakasnina'=>['required','numeric'],
            'brojPopisa'=>['required','integer']
      ]);
      $posudba->update($validated);
      return redirect()->route("posudba.pocetna",$clanskaIskaznica)->with('status','Posudba ažurirana');
    }
}
