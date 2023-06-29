<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exception\Handler;
use Redirect;
use Session;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {  

       if (Auth::guard($guard)->check()){
         if(auth()->user()->str_user_type=='admin'){
           return redirect('webpanel/dashboard');
         }else{
            Session::flush();//destory the current session
           //echo '<script>alert("You do not have access");</script>';
            //return response('Unauthorized.', 401);
            return redirect('403');
            //echo '<script>alert("You do not have access");</script>';            
         }
       }  
       return $next($request);     
    }    
}