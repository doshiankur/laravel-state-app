<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\ProgramCalender;
use App\Http\Controllers\Controller;

class ProgramcalendarController extends Controller
{

 public function getProgramCalendar(Request $request){

   $language=$request->language;
   $ProgramCalendar=ProgramCalender::where('strLanguageCode',$language)->where('enmStatus','=','1')->get(); 
          return response()->json([
          	'status'=>200,
            'content'=>$ProgramCalendar,
            'message'=>'Program Calendar Content Successfully'
        ]);      
  }
}