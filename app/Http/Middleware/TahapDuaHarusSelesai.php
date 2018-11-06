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
        if(!is_null($request->user())){
            if($request->user()->tahap_2 == 'belum' && $request->user()->role == 'member'){
                return redirect()->route('tahap2');
            }
        }
        return $next($request);
    }
}
