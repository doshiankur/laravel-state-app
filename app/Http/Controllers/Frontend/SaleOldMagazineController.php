<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\SaleOldMagazine;

class SaleOldMagazineController extends Controller
{
    //
    public function getSaleOldMagazine(Request $request){
       
       $language=$request->language;

       $salesoldmagazine=SaleOldMagazine::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();

       return response()->json([
       	    'status'=>200,
            'content'=>$salesoldmagazine,
            'message'=>'ReadingCorner Content Successfully']);
    }
}
