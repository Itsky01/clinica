<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UsuarioMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {


        if (auth()->check() && auth()->user()-> rol =='1') {
           
          // return redirect()->route('profesionales');
            return $next($request); // dashboard
          
         }else{

            abort(403, 'Unauthorized action.');
         }
       
    }
}
