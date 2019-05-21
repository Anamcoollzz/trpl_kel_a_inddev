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
            $role = $request->user()->role;
            if(in_array($role, ['member', 'klien']))
                return $next($request);
        }
        return redirect()->route('masuk',['goto'=>url()->previous()])->with('error_msg','Silakan masuk terlebih dahulu');
    }
}
