<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //dd("hi");
       return view('admin.dashboard');
    }

    /**
    * Log out of Auth0
    *
    * @return mixed
    */
      public function logout(){
       //dd("hi");
        auth()->logout();
        return view('auth.login');
      }
}