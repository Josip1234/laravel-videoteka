<?php

use App\Http\Controllers\ClanController;
use App\Http\Controllers\ClanskaIskaznicaController;
use App\Http\Controllers\VideotekaController;
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
    Route::post('{videoteka}/save','spremi')->name('novi')->middleware("jedinstveni.clan");
    Route::get('{videoteka}/{clanska_iskaznica}/edit','azuriranje')->name('azuriraj'); 
    Route::put('{videoteka}/{clanska_iskaznica}/update','azuriraj')->name('azuriranje');
    Route::delete('{videoteka}/{clanska_iskaznica}/delete','izbrisi_clana')->name('ispisivanje');
});
//ovo su grupe ruta za podatke od članova ne treba nam ovo trebam samo popis detalja nemamo crud ovdje 
//korisnike ćemo ubacivati preko seedera
Route::prefix('clan')->name('clan.')->controller(ClanController::class)->group(function(){
    Route::get('{videoteka}/{clanska_iskaznica}/detalji','detalji')->name('detalji');
});