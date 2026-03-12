<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ClanskaIskaznica;

class ProvjeriJedinstvenogClanaZaPojedinuVideoteku
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $oib_videoteke=$request->input('oib_videoteke');
        $oib_user=$request->input('oib_clana');
        $clanovi=ClanskaIskaznica::selectRaw('COUNT(*) as broj')->where('oib_videoteke','=',$oib_videoteke)->where('oib_clana',"=",$oib_user)->groupBy('oib_videoteke')->get();
        $clanovi=json_decode($clanovi,true);
        if($clanovi!=null || !empty($clanovi) || $clanovi==='' ){
            abort("403","Ne može se upisati već upisani korisnik u videoteku");
        }
        return $next($request);
    }
}
