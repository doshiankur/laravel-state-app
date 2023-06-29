<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Exception\Handler;
use Closure;
use App\Providers\RouteServiceProvider;
use Redirect;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    //protected $loginPath = '/webpanel/login';
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
   /* public function handle($request, Closure $next)
    {
        //dd("hi");

      if(auth()->user()){
        if(auth()->user()->str_user_type!='admin')
        {
            if ($request->ajax())
            { //dd("sfsd");
              return redirect('webpanel/dashboard');                
            }
            else
            { //dd("else");
                 return \Response::view('errors.404', [],404);
                //return abort(403, 'Page not found.');
                //return response(404);
            }
        }
        return $next($request);
     }else{
           return redirect(RouteServiceProvider::HOME);
     }
   }*/







   /* public function handle($request, Closure $next)
    { //dd("hi");//dd($request);
       //dd(auth()->user()->str_user_type);

        if(auth()->user()->str_user_type==='admin'){
            return $next($request);
            //redirect('/dashboard');
        }
        return redirect('/webpanel/login');
        //dd($next($request));   
        //return route('login');
        //return redirect('/webpanel/login')->with('error',"You don't have admin access.");
    }*/

     public function handle($request, Closure $next, $guard = null)
    {  
       if(auth()->user()){ 
        if (Auth::guard($guard)->check()) { 
          if (auth()->user()->str_user_type =='admin'){ 
             return $next($request);
             //return redirect()->intended(route('webpanel.dashboard'));
            //redirect('/dashboard'); // make sure the urls is correct with condition above 
          }else{ 
             return redirect()->route('login');
          //return Redirect::to('webpanel/login');            
             //return view('login');
            //dd(redirect()->back());
            //return redirect()->back('/webpanel/login');
            return \Response::view('errors.404', [],404);
          }
          //return route('login');
          //abort(404);
            //return handle::render($request, $exception);
        }
      }else{

          if(array_key_exists('HTTP_AUTHORIZATION', $request->server())) {
             if(($request->server()['HTTP_AUTHORIZATION']=='Bearer 2|IwXoOwBEjVNfS67AIz5Fyz56ic87CkT1hPy7x4J7')){
                    return $next($request);     
                 }
             else{
                    return \Response::view('errors.500', [],500);
                }
           }else{
                 return \Response::view('errors.404', [],404);
           }         
      }      
    }
}