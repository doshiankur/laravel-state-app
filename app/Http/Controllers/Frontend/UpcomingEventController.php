<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\UpcomingEvent;


class UpcomingEventController extends Controller
{
    

    public function getUpcomingEvent(Request $request){
        //echo $request;exit();
        
        $language=$request->language;

         $UpcomingEvent=UpcomingEvent::where('strLanguageCode', $language)->where('enmStatus','=','1')
                        ->OrderBy('dtiEventDate','DESC')->first();
          return response()->json([
            'status'=>200,
            'content'=>$UpcomingEvent,
            'message'=>'UpcomingEvent Content Successfully'
        ]);
    }  
     public function getUpcomingEventList(Request $request){
        //echo $request;exit();
        
        $language=$request->language;

         $UpcomingEvent=UpcomingEvent::where('strLanguageCode', $language)->where('enmStatus','=','1')
                        ->OrderBy('dtiEventDate','DESC')->get();
          return response()->json([
            'status'=>200,
            'content'=>$UpcomingEvent,
            'message'=>'UpcomingEvent Content Successfully'
        ]);
    }      
}