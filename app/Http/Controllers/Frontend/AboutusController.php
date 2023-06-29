<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Aboutus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class AboutusController extends Controller
{
    //
    public function getAboutus(Request $request){

          $language=$request->language;
          $aboutus=Aboutus::where('strLanguageCode','=',$language)
                           ->where('enmStatus','=','1')->first();

/*          return response()->json(['status'=>200,
                                'content'=>$aboutus,
                              'message'=>'Aboutus Content Successfully'],JSON_UNESCAPED_UNICODE);*/

                       /* $json = Collection::make([
                                'status'=>200,
                                'content'=>$aboutus,
                                'message'=>'Aboutus Content Successfully'
                                ﻿])->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                       dd($json);*/

$data2 = strip_tags($aboutus); // Remove Html
   // $data2 = str_replace("\\","",$data2); // Remove /n//r

 
    $data2 = json_decode($data2,true); // Format all data


//dd($data2);





                     $collection = new Collection([
                            'status' =>  200,
                            'content'=>$data2,
                            'message'=>'Aboutus Content Successfully'
                        ]);                        
           //$final_json=$collection->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                 //dd($final_json);

          //return $data2;


return response()->json(['status'=>200,
                                'content'=>$data2,
                              'message'=>'Aboutus Content Successfully']);
       





    }
}