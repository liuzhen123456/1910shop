<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
       
        $username=session("username");
        if(!$username){
            $cookie=request()->cookie("username");
            if($cookie){
                session(['username'=>unserialize("cookie")]);
            }else{
                return redirect("/login/create");
            }
            
        }
        return $next($request);
    }
}
