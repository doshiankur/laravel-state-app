<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\ManagementVillageLibraries;

class ManagementVillageLibrariesController extends Controller
{
    //
    public function getManagementVillage(Request $request){
           $language=$request->language;
           $Management=ManagementVillageLibraries::where('strLanguageCode',$language)
                                                 ->where('enmStatus','=','1')
                                                 ->first();
          return response()->json([
       	                        'status'=>200,
                                'content'=>$Management,
                                'message'=>'Management Content Successfully']);
    }
}
