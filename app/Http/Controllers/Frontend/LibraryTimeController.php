<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Admin\libraryTime;


class LibraryTimeController extends Controller
{
    //
     public function getLibraryTime(Request $request){
        //echo $request;exit();
        $language=$request->language;
         $libraryTime=libraryTime::where('strLanguage', $language)->where('enmStatus','=','1')->first();
          return response()->json([
            'status'=>200,
            'content'=>$libraryTime,
            'message'=>'Library Time Fatched Successfully'
        ]);

 
    }
}
