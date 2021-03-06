<?php

namespace App\Http\Middleware;

use Closure;

class TahapSatuHarusSelesai
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
            if($request->user()->tahap_1 == 'belum'){
                return redirect()->route('tahap1',['goto'=>url()->previous()]);
            }
        }
        return $next($request);
    }
}
