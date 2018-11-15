<?php

namespace App\Http\Middleware;

use Closure;

class TahapTigaHarusSelesai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!is_null($request->user())){
            if($request->user()->tahap_3 == 'belum' && $request->user()->role == 'member'){
                return redirect()->route('tahap3',['goto'=>url()->previous()]);
            }
        }
        return $next($request);
    }
}
