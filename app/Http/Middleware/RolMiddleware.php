<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()-> rol =='1') {
           return $next($request);
           return redirect()->route('profesionales') ;
       
}else{

    if (auth()->check() && auth()->user()-> rol =='2') {
       return $next($request);
       return redirect()->route('pacientes');
}else{

    return redirect('/');
}

}


}
}
