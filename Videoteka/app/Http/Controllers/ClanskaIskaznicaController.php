<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ClanskaIskaznicaController extends Controller
{
    public function getClanskaIndex(Request $request){
        return view('clanska_iskaznica.index');
    }
}
