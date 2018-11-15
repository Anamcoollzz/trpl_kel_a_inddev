<?php

namespace App\Http\Middleware;

use Closure;

class HanyaMember
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
        if($request->user()){
            if($request->user()->role == 'member')
                return $next($request);
        }
        return redirect()->route('masuk',['goto'=>url()->previous()])->with('error_msg','Silakan masuk terlebih dahulu');
    }
}
