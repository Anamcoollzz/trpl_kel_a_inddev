<?php

namespace App\Http\Middleware;

use Closure;

class TahapDuaHarusSelesai
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
        // dd($request->user()->tahap_2);
        if(!is_null($request->user())){
            if($request->user()->tahap_2 == 'belum'){
                return redirect()->route('tahap2');
            }
        }
        return $next($request);
    }
}
