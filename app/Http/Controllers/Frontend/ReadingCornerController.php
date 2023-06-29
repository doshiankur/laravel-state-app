<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\ReadingCorner;
use App\Http\Controllers\Controller;

class ReadingCornerController extends Controller
{
    //
    public function getReadingCorner(Request $request){
       $language=$request->language;
       $readingCorner=ReadingCorner::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();

       return response()->json(['status'=>200,
            'content'=>$readingCorner,
            'message'=>'ReadingCorner Content Successfully']);

    }
}
