<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Administrative;

class AdministrativeofficeController extends Controller
{
    
    public function getAdministrative(Request $request){
        $language=$request->language;
        $admin=Administrative::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();
        return response()->json([
        	'status'=>200,
            'content'=>$admin,
            'message'=>'Administrative Content Successfully']);
    }
}
