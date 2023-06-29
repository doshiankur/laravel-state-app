<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Introduction;


class IntroductionController extends Controller
{
    //FOR GET INTRODUCTION CONTENT  HP

    public function getContents(Request $request){
        //echo $request;exit();
        $language=$request->language;
        $introduction=Introduction::where('strLanguage', $language)->where('enmStatus','=','1')->first();
          return response()->json([
            'status'=>200,
            'content'=>$introduction,
            'message'=>'INtroduction Content Successfully'
        ]);

    }
    //END CODE FOR GET INTRODUCTION CONTENT 
}
