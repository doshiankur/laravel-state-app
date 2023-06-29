<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Copyright;
use App\Http\Controllers\Controller;

class CopyrightController extends Controller
{
	
    public function getCopyRight(Request $request){

        $language=$request->language;
        $copyright=Copyright::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();

        return response()->json([
        	'status'=>200,
            'content'=>$copyright,
            'message'=>'Copyright Department Content Successfully']);

    }
}
