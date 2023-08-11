<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// este archivo controla la peticion antes de llamar al controlador o sea llama a un determinado controlador si solo se cumple
// que el usuario sea admin
class AdminMiddleware
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
        
            
               
                if (auth()->check() && auth()->user()-> rol =='2') {

                    return $next($request); // dashboard
              //  return redirect()->route('pacientes');
            }else{

                abort(403, 'Unauthorized action.');
             }
        }


        
    }

