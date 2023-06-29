<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Announcement;


class AnnouncementController extends Controller
{
    
    public function getAnnouncementContents(Request $request){
        //echo $request;exit();
        $language=$request->language;
         $announcement=Announcement::where('strLanguage', $language)->where('enmStatus','=','1')->first();
          return response()->json([
            'status'=>200,
            'content'=>$announcement,
            'message'=>'Announcement Content Successfully fatched'
        ]);
    }
    public function getAnnouncementContentsList(Request $request){
        //echo $request;exit();
        
        $language=$request->language;

         $announcement=Announcement::where('strLanguage', $language)->where('enmStatus','=','1')
                        ->OrderBy('dtiEventDate','DESC')->get();
          return response()->json([
            'status'=>200,
            'content'=>$announcement,
            'message'=>'Announcement Content Successfully fatched'
        ]);
    }     
}
