<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videoteka;
use Illuminate\View\View;

class VideotekaController extends Controller
{
    public function getVideotekaIndex(Request $request)
    {
        //ako postoji varijabla videoteka i ako je postavljena i različita od nule
        if(isset($_GET["videoteka"])){
            $query=$request->input('videoteka');
        $pronadjenjo=Videoteka::when($query,function($q) use ($query){
            $q->where('naziv','like','%'.$query.'%');
        })->orderBy('oib')->get();
        }
        

        $perPage = 5;

        // trenutna stranica (default 1)
        $page = max((int)$request->get('page', 1), 1);

        // OFFSET = (page - 1) * 5
        $offset = ($page - 1) * $perPage;

        $ukupnoZapisa = Videoteka::orderBy('oib')->count();
        $videoteka = Videoteka::orderBy('oib')->limit($perPage)->offset($offset)->get();
        $totalPages = (int)ceil($ukupnoZapisa / $perPage);

        if(isset($_GET["videoteka"])){
            
        return view('videoteka.index', [
            'videoteka' => $pronadjenjo,
            'page' => $page,
            'totalPages' => $totalPages,
            'query'=>$query
        ]);
        }else{
         return view('videoteka.index', [
            'videoteka' => $videoteka,
            'page' => $page,
            'totalPages' => $totalPages,
         ]);
        }
    }
    public function nova(): View
    {
        return view("videoteka.create");
    }
    public function spremi(Request $request)
    {
        $validated = $request->validate([
            'oib' => ['required', 'string', 'digits_between:11,11'],
            'naziv' => ['required', 'string', 'max:50'],
            'adresa' => ['required', 'string', 'max:100'],
        ]);
        Videoteka::create($validated);
        return redirect()->route('videoteka.pocetna')->with('status', 'Dodana nova videoteka.');
    }
    public function obrisi(Videoteka $videoteka)
    {
        $videoteka->delete();
        return redirect()->route('videoteka.pocetna')->with('status', 'Videoteka uspješno izbrisana');
    }
    public function uredi(Videoteka $videoteka): View
    {
        return view("videoteka.edit", ['videoteka' => $videoteka]);
    }
    public function update(Request $request, Videoteka $videoteka)
    {
        $validated = $request->validate([
            'oib' => ['required', 'string', 'digits_between:11,11'],
            'naziv' => ['required', 'string', 'max:50'],
            'adresa' => ['required', 'string', 'max:100'],
        ]);
        $videoteka->update($validated);
        return redirect()->route('videoteka.pocetna')->with('status','Videoteka uspješno ažurirana');
    }
}
