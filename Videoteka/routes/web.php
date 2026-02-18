<?php

use App\Http\Controllers\VideotekaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pocetna');
});
Route::prefix('videoteka')->name('videoteka.')->controller(VideotekaController::class)->group(function(){
    Route::get('/index','getVideotekaIndex')->name('pocetna');
     Route::get('/create','nova')->name('create');
     Route::post('/','spremi')->name('novi');
     Route::delete('/{videoteka}','obrisi')->name('brisanje');
     Route::get('/{videoteka}/edit','uredi')->name('uredi');
     Route::put('/{videoteka}','update')->name('azuriraj');
});