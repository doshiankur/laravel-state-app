<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\TVRoom;
use App\Http\Models\Admin\Languages;

class TvRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tvroom = TVRoom::all();
        return view('admin.tvroom.index', compact('tvroom'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $language=Languages::all();
        //dd($language);
        return view('admin.tvroom.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, ['strLanguageCode' => 'required',
                                    'strTVRoom' => 'required',
                                    'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strTVRoom']=$request->input('strTVRoom');
        $data['strPageName']=$request->input('strPageName');
             //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=TVRoom::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   
       

        $languages = TVRoom::create($data);
         return redirect('webpanel/tvroom')->with('flash_message', 'TV Room Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $tvroom = TVRoom::select('id','strLanguageCode','strTVRoom','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.tvroom.edit', compact('tvroom','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
                $this->validate($request, ['strLanguageCode' => 'required',
                                           'strTVRoom' => 'required',
                                           'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strTVRoom']=$request->input('strTVRoom');
        $data['strPageName']=$request->input('strPageName');
        $language = TVRoom::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/tvroom')->with('flash_message', 'TV Room Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

          TVRoom::destroy($id);
        return redirect('webpanel/tvroom')->with('flash_message', 'TV Room Deleted!');
    }
    //change status for TVroom start here developed by Harin
    
    public function tvRoomstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = TVRoom::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}
