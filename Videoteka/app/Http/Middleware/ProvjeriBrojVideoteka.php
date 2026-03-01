<?php

namespace App\Http\Middleware;

use App\Models\Videoteka;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvjeriBrojVideoteka
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $brojVideoteka=Videoteka::selectRaw('COUNT(*) as ukupno')->get();
        $broj=$brojVideoteka[0]["ukupno"];
        //ako nema videoteke redirektaj na kreiranje nove 
        if($broj==0){
            return redirect()->route("videoteka.create");
        }
        return $next($request);
    }
}
