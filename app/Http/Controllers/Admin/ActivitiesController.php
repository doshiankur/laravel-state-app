<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Languages;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Activities;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $languages=Languages::all();
        //dd($languages);
        $Activities=Activities::all();
        //dd($Activities);
        return view('admin.activities.index',compact('languages','Activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        return view('admin.activities.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd("hi"); 
       //dd($request);
       $this->validate($request, ['strActivities'=>'required',
                                   'strLanguageCode' => 'required',
                                  'strPageName'=>'required']);  

    //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Activities::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        // $data_status=Activities::where('strLanguageCode','=',$request->input('strLanguageCode'))->tosql();
        // dd($data_status);
        // return false;
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        $data['strActivities']=$request->input('strActivities');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $aboutus = Activities::create($data);
        return redirect('webpanel/activities')->with('flash_message', 'Activities Added!');
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
        //dd($id);
        $language=Languages::all();
         $activities=Activities::select('*')->findOrfail($id);
        // $activities=Activities::select('*')->findOrfail($id)->tosql();
        // dd($activities);
        // return false;
        return view('admin.activities.edit',compact('language','activities'));
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
        //dd($request);
         $this->validate($request, ['strActivities'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);   
        
        $data['strActivities']=$request->input('strActivities');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $aboutus = Activities::findOrFail($id);
        $aboutus->update($data);
        return redirect('webpanel/activities')->with('flash_message', 'Activities Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Activities::destroy($id);
        return redirect('webpanel/activities')->with('flash_message','Activities Deleted!');
    }

    //change status for activities start here developed by Harin
    
    public function activitystatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Activities::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            // $event = Activities::where('id',$data['id'])->update(['enmStatus'=>$data['status']])->tosql();
            // dd($event);
            // return false;
            return $request->status;
        }
        return false;
    }
    //End Here
}