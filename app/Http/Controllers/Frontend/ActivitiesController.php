<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Activities;


class ActivitiesController extends Controller
{
    //
    public function getActivities(Request $request){
           
           $language_code=$request->language;
           $Activities =Activities::where('strLanguageCode',$language_code)->where('enmStatus','=','1')->get();

           return response()->json([
            'status'=>200,
            'content'=>$Activities,
            'message'=>'Activities Content Successfully'
           ]);
    }
}
