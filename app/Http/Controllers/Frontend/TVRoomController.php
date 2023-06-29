<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\TVRoom;

class TVRoomController extends Controller
{
    public function getTVRoom(Request $request){

          $language=$request->language;
         $Tvroom=TVRoom::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();
            return response()->json([
          	'status'=>200,
            'content'=>$Tvroom,
            'message'=>'Tvroom Content Successfully']);
    }
}