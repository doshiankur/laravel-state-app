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


use App\Http\Models\Admin\Languages;

class PhotoGalleryController extends Controller
{
    public function index(Request $request)
    {
          $gallery=Gallery::all();
        //dd($languages);
        return view('admin.photogallery.index',compact('gallery'));
        // $gallery=Gallery::where('enmDeleted','0')->OrderBy('id')->get();
        // return view('admin.photogallery.index',compact('gallery'));
    }
    public function create()
    {
        return view('admin.photogallery.create');
    }
      public function store(Request $request)
    { 
        
        $data = $request->all();
        ini_set('memory_limit','256M');
       $data = $request->file();
       
        $this->validate($request, ['strName' => 'required','txtVenue' => 'required','strImg'=>'required']);
   
    
        if($data['strImg']){
           $file_name = time()."_".$data['strImg']->getClientOriginalName();
           $data['strImg']->move(base_path() . '/public/upload/gallery',$file_name);
           $data['strImg']=$file_name;           
      }    
        $data['strName']=$request->input('strName');
        $data['txtVenue'] = $request->input('txtVenue');
        $data['dtiEventdatetime']= date('Y-m-d H:i:s');
        //dd($data);
        $languages = Gallery::create($data);
        return redirect('webpanel/photo_gallery')->with('flash_message', 'Image  added!');
    }
   
}
?>
