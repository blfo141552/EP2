<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(!$request->user()){
          dd('Debe iniciar sesión');
        }else{
          if($request->user()->admin()){
            return $next($request);
          }else {
            return response()->view('Errors.401');
            /*colocar boton de sesion****/
          }
        }
    }
}
