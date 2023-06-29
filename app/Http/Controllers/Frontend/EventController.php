<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Event;
use App\Http\Models\Admin\EventGallery;


class EventController extends Controller
{
    //FOR GET Event CONTENT  HP

    public function geteventdetails(Request $request){
     
        $event=Event::where('enmDeleted','0')->OrderBy('id')->get();
               $k=0;
          for($i=0;$i<sizeof($event);$i++){
              $data[$k]['id']=$event[$i]['id'];
              $data[$k]['strName']=$event[$i]['strName']; 
              
              $data[$k]['txtVenue']=$event[$i]['txtVenue']; 
                          
              $data[$k]['strImg']=asset('/public/upload/Event')."/".$event[$i]['strImg'];

              $data[$k]['dtiEventdatetime']=$event[$i]['dtiEventdatetime']; 
              $k++;
         }
       
       //  $announcement=Event::where('strLanguage', $language)->first();
          return response()->json([
            'status'=>200,
            'content'=>$data,
            'message'=>'Event Details  Successfully fatched'
        ]);

    }
    //END CODE FOR GET EVENT CONTENT 

    //GET EventGallery data HP
     public function geteventgallery(Request $request){
      $eventgalleryid=$request->eventgalleryid;
      //echo $_REQUEST['eventgalleryid']; exit();     
       $eventgallery = EventGallery::join('mst_event','mst_event_gallery.intEventid','=','mst_event.id')
                    ->select('mst_event.*','mst_event_gallery.StrEventImg',
                      'mst_event_gallery.intEventid','mst_event_gallery.id as event_galleryID')
                    ->where('intEventid', $eventgalleryid)
                    ->where('mst_event_gallery.enmDeleted', '0')
                    ->get();
        // 
          // dd($eventgallery);
               $k=0;
          for($i=0;$i<sizeof($eventgallery);$i++){
              $data[$k]['id']=$eventgallery[$i]['event_galleryID'];
              $data[$k]['intEventid']=$eventgallery[$i]['intEventid'];
              $data[$k]['image']=asset('/public/upload/EventGallery/medium')."/".$eventgallery[$i]['StrEventImg'];

            if($i==0){
                $data1[$k]['id']=$eventgallery[$i]['id'];
                $data1[$k]['strName']=$eventgallery[$i]['strName'];
                $data1[$k]['dtiEventdatetime']=$eventgallery[$i]['dtiEventdatetime'];
                $data1[$k]['txtVenue']=$eventgallery[$i]['txtVenue'];
                $data1[$k]['strImg']=$eventgallery[$i]['strImg'];
                $data1[$k]['enmStatus']=$eventgallery[$i]['enmStatus'];           
             }        
              $k++;
         }       
       //  $announcement=Event::where('strLanguage', $language)->first();
          return response()->json([
            'status'=>200,
            'content'=>$data,
            'eventdata'=>$data1,
            'message'=>'EventGallery Details  Successfully fatched'
        ]);

    }
    //End Event Gallery Data Hp
}
