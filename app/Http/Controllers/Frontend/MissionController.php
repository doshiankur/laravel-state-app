<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\MissionVission;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    //
    public function getMission(Request $request){
            
         $language_code=$request->language;
         $mission=MissionVission::where('strLanguageCode',$language_code)->where('enmStatus','=','1')->get();  
         $data=$mission;
         return response()->json(['status'=>200,
            'content'=>$data,
            'message'=>'Leaders Content Successfully']);
    }
}
