<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Gallery;


class GalleryController extends Controller
{
    public function getGallery(Request $request){
    
         $language=$request->language;
    
         $Gallery=Gallery::where('strLanguageCode', $language)->get();

         for($i=0;$i<sizeof($Gallery);$i++){
              $data[$i]['id']=$Gallery[$i]['id'];
              $data[$i]['strPartnerLogo']=asset('/public/upload/gallery')."/".$Gallery[$i]['strPhoto']; 
         }

         return response()->json([
            'status'=>200,
            'content'=>$data,
            'message'=>'Gallery Content Successfully'
        ]);
    }    
}