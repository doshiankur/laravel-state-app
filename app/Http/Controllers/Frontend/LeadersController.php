<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Leaders;


class LeadersController extends Controller
{
   

    public function getLeaders(Request $request){
        //echo $request;exit();
        $language=$request->language;
         $Leaders=Leaders::where('strLanguageCode', $language)
                  ->where('enmStatus','=','1')
                  ->OrderBy('intDisplay','ASC')
                  ->get();
              $single_data[0]['id']=$Leaders[0]['id'];
              $single_data[0]['strLeadersName']=$Leaders[0]['strLeadersName']; 
              $single_data[0]['strDesignation']=$Leaders[0]['strDesignation']; 
              $single_data[0]['strLanguageCode']=$Leaders[0]['strLanguageCode'];  
              $single_data[0]['strPlace']=$Leaders[0]['strPlace'];  
                           
              $single_data[0]['strLeadersPhoto']=asset('/public/upload/leaders')."/".$Leaders[0]['strLeadersPhoto']; 

               $k=0;
          for($i=1;$i<sizeof($Leaders);$i++){
              $data[$k]['id']=$Leaders[$i]['id'];
              $data[$k]['strLeadersName']=$Leaders[$i]['strLeadersName']; 
              //$leader_export=explode(".",$Leaders[$i]['strDesignation']);
              //$data[$k]['strDesignation']=$Leaders[$i]['strDesignation']; 

              $data[$k]['strDesignation']=$Leaders[$i]['strDesignation']; 
              //$data[$k]['otherDesignation']=$leader_export[1]; 


              $data[$k]['strLanguageCode']=$Leaders[$i]['strLanguageCode']; 
              $data[$k]['strPlace']=$Leaders[$i]['strPlace'];               
              $data[$k]['strLeadersPhoto']=asset('/public/upload/leaders')."/".$Leaders[$i]['strLeadersPhoto'];
              $k++;
             //dd($leader_export);
         }
        
          return response()->json([
            'status'=>200,
            'content'=>@$data,
            'single_data'=>$single_data,
            'message'=>'Leaders Content Successfully'
        ]);

    }
}