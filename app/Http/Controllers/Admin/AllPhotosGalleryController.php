<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Models\Tags;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
 
 use App\Http\Models\Admin\Gallery;
 use App\Http\Models\Admin\AllPhotosGallery;
 //AllPhotos

// use App\Http\Models\Admin\Languages;

class AllPhotosGalleryController extends Controller
{
    public function index(Request $request, $photogalleryid)
    {
        //  $photogallery=Gallery::all();
            $photogallery = AllPhotosGallery::where('intEventid', $photogalleryid)->get();
             $foldername = 'AllImageGallery';
         if ($request->isMethod('post')) {

            $data = $request->all();
            if(!empty($request->StrEventImg)){
                $images       = $request->StrEventImg;
                foreach($images as $image){
                    $filename    = time().str_replace(' ','',$image->getClientOriginalName());

                   
                    if (!file_exists('public/upload/'.$foldername)) {
                        mkdir('public/upload/'.$foldername, 0777, true);
                        mkdir('public/upload/'.$foldername.'/thumbnail', 0777, true);
                    }

                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(150, 150);
                    $image_resize->save('public/upload/'.$foldername.'/thumbnail/'.$filename);

                    $data['StrEventImg'] = $filename;

                    Image::make($image->getRealPath())->resize('790', '623')->save('public/upload/'.$foldername.'/'.$filename);
                    $data['intEventid'] = $eventgalleryid;
                    // $data['idCreatedBy'] = Auth::id();
                    // $data['dtiCreated'] = Carbon::now();
                    // $data['idModifiedBy'] = Auth::id();
                    // $data['dtiModified'] = Carbon::now();

                    $photogallery = AllPhotosGallery::create($data);
                }
                return redirect('webpanel/allPhotoGallery/'.$photogalleryid)->with('flash_message', 'Content added!');
            }
        }
        return view('admin.Allphotogallery.index', compact('photogallery', 'photogalleryid', 'foldername'));
    }
     public function destroyimage(Request $request)
    {
        $id = $request->id;
        $eventid = $request->eventid;
        $gallery = EventGallery::where('id',$id)->update([ 'enmDeleted'=>'1' ]);
        echo '1';
    }
}
?>
