<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\MissionVission;
use App\Http\Models\Admin\Languages;


class MissionVissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mission=MissionVission::all();

       // dd($mission);
        return view('admin.missionvission.index',compact('mission'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $language=Languages::all();
        return view('admin.missionvission.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd("hi"); 
        $this->validate($request, ['strTitle' => 'required',
                                   'strLanguageCode' => 'required',
                                   'strMissionVission'=>'required',
                                   'strPageName'=>'required']);
   
        $data['strTitle']=$request->input('strTitle');
        $data['strMissionVission'] = $request->input('strMissionVission');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
            //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=MissionVission::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here       
   
       //dd($data);
       
        $languages = MissionVission::create($data);
       
       return redirect('webpanel/missionvisions')->with('flash_message', 'Mission Vision Added!');
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
    public function edit($id){
        //
        //dd($id);
    $mission=MissionVission::select('id','strMissionVission','strTitle','strLanguageCode',
                                    'strTitle','strPageName')->findOrFail($id);
    $language=Languages::all();
    return view('admin.missionvission.edit',compact('mission','language'));
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
         $this->validate($request, ['strTitle' => 'required',
                                    'strLanguageCode' => 'required',
                                    'strMissionVission'=>'required',
                                    'strPageName'=>'required']);
   

        $data['strTitle']=$request->input('strTitle');
        $data['strMissionVission'] = $request->input('strMissionVission');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
       // dd($data);

        $language = MissionVission::findOrFail($id);
        $language->update($data);

        return redirect('webpanel/missionvisions')->with('flash_message', 'Mission Vision Updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        MissionVission::destroy($id);
        return redirect('webpanel/missionvisions')->with('flash_message', 'Mission Vision Deleted!');
    }
    //change status for Mission vission start here developed by Harin
    
    public function missionVissionstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = MissionVission::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
    

}