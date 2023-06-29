<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Functions;
use App\Http\Controllers\Controller;

class FunctionsController extends Controller
{
    //
    public function getFunctions(Request $request){
          
          $language=$request->language;
          $functions=Functions::where('strLanguageCode',$language)->where('enmStatus','=','1')->get();

          return response()->json([
          	'status'=>200,
            'content'=>$functions,
            'message'=>'Functions Content Successfully']);
    }
}
