<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Languages;
//use App\Http\Models\Users;


class LanguageController extends Controller
{
    //FOR GET INTRODUCTION CONTENT  HP

     public function getLanguage(){
           $languages=Languages::orderBy('strLanguage','DESC')->get();
           return response()->json([
            'status'=>200,
           'languages'=>$languages,
          'message'=>'Get All Languages successfull']);
    }
    //END CODE FOR GET INTRODUCTION CONTENT 
}
