<?php

use App\Http\Controllers\CjenikController;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\ClanskaIskaznicaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\MedijController;
use App\Http\Controllers\PopisController;
use App\Http\Controllers\PosudbaController;
use App\Http\Controllers\VideotekaController;
use App\Http\Controllers\VrstaCjenikaController;
use App\Http\Controllers\ZanrController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pocetna');
});
Route::prefix('videoteka')->name('videoteka.')->controller(VideotekaController::class)->group(function(){
    Route::get('/index','getVideotekaIndex')->name('pocetna')->middleware("broj.videoteka");
     Route::get('/create','nova')->name('create');
     Route::post('/','spremi')->name('novi');
     Route::delete('/{videoteka}','obrisi')->name('brisanje');
     Route::get('/{videoteka}/edit','uredi')->name('uredi');
     Route::put('/{videoteka}','update')->name('azuriraj');
});
//sljedeća grupa ruta su za tablicu članskih iskaznica
Route::prefix('clanska_iskaznica')->name('clanska_iskaznica.')->controller(ClanskaIskaznicaController::class)->group(function(){
    Route::get('{videoteka}/index','getClanskaIndex')->name('pocetna');
    Route::get('{videoteka}/create','novi_clan')->name('noviClan');
    //kod posta će se provjeravati jedinstvenog člana ako postoji neće se izvršiti
    Route::post('{videoteka}/save','spremi')->name('novi');
    Route::get('{videoteka}/{clanska_iskaznica}/edit','azuriranje')->name('azuriraj'); 
    Route::put('{videoteka}/{clanska_iskaznica}/update','azuriraj')->name('azuriranje');
    Route::delete('{videoteka}/{clanska_iskaznica}/delete','izbrisi_clana')->name('ispisivanje');
});
//ovo su grupe ruta za podatke od članova ne treba nam ovo trebam samo popis detalja nemamo crud ovdje 
//korisnike ćemo ubacivati preko seedera
Route::prefix('clan')->name('clan.')->controller(ClanController::class)->group(function(){
    Route::get('{videoteka}/{clanska_iskaznica}/detalji','detalji')->name('detalji');
});
//grupa ruta za medij
Route::prefix('medij')->name('medij.')->controller(MedijController::class)->group(function(){
    Route::get('index','index')->name('pocetna'); 
    Route::get('create','create')->name('noviMedij');
    Route::post('create','spremanje')->name('spremi');
    Route::get('{medij}/edit','editForm')->name('uredi');
    Route::put('{medij}/edit','azuriraj')->name('azuriraj');
    Route::delete('{medij}/delete','izbrisi')->name('izbrisi');
});
//grupa ruta za žanr
Route::prefix('zanr')->name('zanr.')->controller(ZanrController::class)->group(function(){
    Route::get('index','index')->name('pocetna');
    Route::get('create','create')->name('noviZanr');
    Route::post('save','save')->name('spremi');
    Route::get('{zanr}/edit','edit')->name('uredi');
    Route::put('{zanr}/update','update')->name('azuriraj');
    Route::delete('{zanr}/delete','delete')->name('brisanje');
});
//grupa ruta za entitet vrste cjenika
Route::prefix('vrsta')->name('vrsta.')->controller(VrstaCjenikaController::class)->group(function(){
    Route::get('index','getIndex')->name('pocetna');
    Route::get('create','getCreateForm')->name('noviCjenik');
    Route::post('save','save')->name('spremi');
    Route::get('{vrsta}/edit','getEdit')->name('azuriranje');
    Route::put('{vrsta}/update','update')->name('azuriraj');
    Route::delete('{vrsta}/delete','delete')->name('izbrisi');
});
//grupa ruta za film 
Route::prefix('film')->name('film.')->controller(FilmController::class)->group(function(){
    Route::get('index','index')->name('pocetna');
    Route::get('create','getCreateForm')->name('noviFilm');
    Route::post('save','saveData')->name('spremi');
    Route::get('{film}/edit','dohvatiFormuZaEdit')->name('edit');
    Route::put('{film}/update','azuriraj')->name('azuriraj');
    Route::delete('{film}/delete','delete')->name('obrisi');
});
//grupa ruta za cjenik
Route::prefix('cjenik')->name('cjenik.')->controller(CjenikController::class)->group(function(){
    Route::get('index','index')->name('pocetna');
    Route::get('{videoteka}/create','getCreateForm')->name('noviCjenik');
    Route::post('/save','saveData')->name("spremi");
    Route::get('{videoteka}/{cjenik}/edit','edit')->name("azuriraj");
    Route::put('{cjenik}/update','update')->name('update');
    Route::delete('{cjenik}/delete','delete')->name('brisanje');
});
//grupa ruta za popis
Route::prefix('popis_posudjenih')->name('popis_posudjenih.')->controller(PopisController::class)->group(function(){
    Route::get('index','index')->name('pocetna');
    Route::get('create','create')->name('novi');
    Route::post('store','store')->name('spremi');
    Route::get('{popis}/edit','edit')->name('azuriranje');
    Route::put('{popis}/update','update')->name('azuriraj');
    Route::delete('{popis}/delete','delete')->name('obrisi');
});
//grupa ruta za posudbe
Route::prefix("posudba")->name("posudba.")->controller(PosudbaController::class)->group(function(){
    Route::get('{clanska_iskaznica}/index','index')->name('pocetna');
    Route::get('{clanska_iskaznica}/create','create')->name('novi');
    Route::post('{clanska_iskaznica}/store','store')->name('spremi');
});