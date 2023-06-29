<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Event;
use App\Http\Models\Admin\EventGallery;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use DB;

class EventGalleryController extends Controller
{
    
 
    public function index(Request $request, $eventgalleryid)
    {
      $eventgallery = EventGallery::where('intEventid', $eventgalleryid)->where('enmDeleted', '0')->get();
                $foldername = 'EventGallery';

      
        if ($request->isMethod('post')) {

            $data = $request->all();
            if(!empty($request->StrEventImg)){
                $images       = $request->StrEventImg;
                foreach($images as $image){
                    $filename    = time().str_replace(' ','',$image->getClientOriginalName());

                    $foldername = 'EventGallery';
                    if (!file_exists('public/upload/'.$foldername)) {
                        mkdir('public/upload/'.$foldername, 0777, true);
                        mkdir('public/upload/'.$foldername.'/thumbnail', 0777, true);
                    }

                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(150, 150);
                    $image_resize->save('public/upload/'.$foldername.'/thumbnail/'.$filename);


                    $data['StrEventImg'] = $filename;

                    Image::make($image->getRealPath())->resize('790', '623')->save('public/upload/'.$foldername.'/'.$filename);

     Image::make($image->getRealPath())->resize('1100', '867')->save('public/upload/'.$foldername.'/medium/'.$filename);
                    


                    $data['enmDeleted'] ="0";
                    $data['intEventid'] = $eventgalleryid;
                    //$data['idCreatedBy'] = Auth::id();
                   // $data['dtiCreated'] = Carbon::now();
                  //  $data['idModifiedBy'] = Auth::id();
                  //  $data['dtiModified'] = Carbon::now();

                    $eventgallery = EventGallery::create($data);
                }
                return redirect('webpanel/eventgallery/'.$eventgalleryid)->with('flash_message', 'Content added!');
            }
        }
        return view('admin.eventgallery.index', compact('eventgallery', 'eventgalleryid', 'foldername'));
    }



     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroyimage(Request $request)
    {
        $id = $request->id;
        $eventid = $request->eventid;
        $gallery = EventGallery::where('id',$id)->update([ 'enmDeleted'=>'1' ]);
        echo '1';
    }
}
?>
