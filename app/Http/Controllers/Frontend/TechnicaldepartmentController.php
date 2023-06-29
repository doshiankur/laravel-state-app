<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\TechnicalDepartment;

class TechnicaldepartmentController extends Controller
{
    public function getTechnicalDepartment(Request $request){
    $language=$request->language;
    $technical=TechnicalDepartment::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();
          return response()->json([
          	'status'=>200,
            'content'=>$technical,
            'message'=>'Technical Department Content Successfully']);
   }
}