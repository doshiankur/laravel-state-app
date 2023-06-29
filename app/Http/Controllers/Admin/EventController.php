<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Event;
use App\Http\Models\Tags;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use App\Http\Models\Admin\Languages;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $language=Languages::all();
        $event=Event::where('enmDeleted','0')->OrderBy('id')->get();
     //   $event=Event::where('enmStatus','1')->OrderBy('id')->get();
        return view('admin.event.index',compact('event','language'));
    }
    public function create()
    {
         $language=Languages::all();
        //$eventdatetime = date('d-m-Y H:i a');
      
        return view('admin.event.create',compact('language'));
    }
    public function store(Request $request)
    {
         $data = $request->all();
        ini_set('memory_limit','256M');
       $data = $request->file();
       
        $this->validate($request, ['strName' => 'required',
                                   'txtVenue' => 'required',
                                   'strImg'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);
   
    
        if($data['strImg']){
           $file_name = time()."_".$data['strImg']->getClientOriginalName();
           $data['strImg']->move(base_path() . '/public/upload/Event',$file_name);
           $data['strImg']=$file_name;           
      }    
        $data['strName']=$request->input('strName');
        $data['txtVenue'] = $request->input('txtVenue');
        $data['dtiEventdatetime']= date('Y-m-d H:i:s');  
        $data['strPageName']=$request->input('strPageName');  
        $data['strLanguageCode']=$request->input('strLanguageCode');     
        //dd($data);
        $languages = Event::create($data);
        return redirect('webpanel/event')->with('flash_message', 'Event Data  Added!');

      
    }
    public function edit($id)
    {
        $event = Event::findOrFail($id);
         $language=Languages::all();
        

        if(!empty($event)){

            $foldername = 'Event';
            if (!file_exists('public/upload/'.$foldername)) {
                if (!is_dir('public/upload/'.$foldername)) {
                    mkdir('public/upload/'.$foldername, 0777, true);
                    mkdir('public/upload/'.$foldername.'/thumbnail', 0777, true);
                }
            }
        }

        return view('admin.event.edit', compact('event', 'foldername','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        
          ini_set('memory_limit','256M');
       $data = $request->file();
       //dd($request);
         $this->validate($request, ['strName' => 'required',                                    
                                    'txtVenue'=>'required',
                                    'strLanguageCode' => 'required',
                                    'strPageName'=>'required']);
   

        if(isset($data['strImg']) && !empty($data['strImg'])) {
           $file_name = time()."_".$data['strImg']->getClientOriginalName();
           $data['strImg']->move(base_path() . '/public/upload/Event',$file_name);
           $data['strImg']=$file_name;           
        }

        $data['strName']=$request->input('strName');
        $data['txtVenue'] = $request->input('txtVenue');
        $data['strPageName']=$request->input('strPageName');
        $data['dtiEventdatetime']=date('Y-m-d H:i:s');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        
        //dd($data);

        $language = Event::findOrFail($id);
        $language->update($data);

        return redirect('webpanel/event')->with('flash_message', 'Event Data Updated!');
       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $event = Event::where('id',$id)->update([ 'enmDeleted'=>'1' ]);
        return redirect('webpanel/event')->with('flash_message', 'Event Data Deleted!');
    }
    public function changeeventstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Event::where('id',$data['id'])->update(['enmstatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
}
?>
