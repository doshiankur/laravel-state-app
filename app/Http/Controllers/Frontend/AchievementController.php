<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Achievement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class AchievementController extends Controller
{
    //
     //
    public function getAchievement(Request $request){

          $language=$request->language;
          $aboutus=Achievement::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();
          $data2 = strip_tags($aboutus); // Remove Html
          $data2 = json_decode($data2,true); // Format all data

         $collection = new Collection([
                      'status' =>  200,
                      'content'=>$data2,
                      'message'=>'Achievement Content Successfully'
                 ]);                        

		return response()->json(['status'=>200,
                                'content'=>$data2,
                                'message'=>'Achievement Content Successfully']);
    }
}