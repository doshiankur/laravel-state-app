<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\ReferenceService;

class ReferenceserviceController extends Controller
{
    public function getRefrenceService(Request $request){

        $language=$request->language;
  
        $ReferenceService=ReferenceService::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();
       
        return response()->json([
        	'status'=>200,
            'content'=>$ReferenceService,
            'message'=>'ReferenceService Content Successfully']);
    }
}