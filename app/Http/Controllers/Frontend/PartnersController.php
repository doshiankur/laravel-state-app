<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Partners;



class PartnersController extends Controller
{
    public function getPartners(Request $request){
    
         $language=$request->language;
        
         $Partners=Partners::where('strLanguageCode', $language)->where('enmStatus','=','1')->get();
         for($i=0;$i<sizeof($Partners);$i++){
            $data[$i]['id']=$Partners[$i]['id'];
              $data[$i]['strPartnerURL']=$Partners[$i]['strPartnerURL'];  
              $data[$i]['strPartnerLogo']=asset('/public/upload/partners')."/".$Partners[$i]['strPartnerLogo']; 
         }
         return response()->json([
            'status'=>200,
            'content'=>$data,
            'message'=>'Partners Content Successfully'
        ]);
    }    
}