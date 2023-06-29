<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Admin\UpcomingEvent;
use DB;
use Carbon\Carbon;


class UpcomingEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$language=Languages::all();
        $upcoming_events=UpcomingEvent::all();
        return view('admin.upcomingevents.index',compact('upcoming_events'));
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
        return view('admin.upcomingevents.create',compact('language'));
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
                                    'strEventTitile' => 'required', 
                                    'dtiEventDate' => 'required' ,
                                    'strEventDescription' => 'required',
                                     'strPageName' => 'required']);
        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strEventTitile']=$request->input('strEventTitile');
        $data['strPageName']=$request->input('strPageName');
        //$data['dtiEventDate']=$request->input('dtiEventDate');
       $data['dtiEventDate']=Carbon::createFromFormat('d/m/Y',$request->input('dtiEventDate'))->format('Y-m-d');
         $data['strEventDescription']=$request->input('strEventDescription');

     //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=UpcomingEvent::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   

        $languages = UpcomingEvent::create($data);
         return redirect('webpanel/upcoming_event')->with('flash_message', 'Upcoming Event Added!');
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
        $upcoming_events = UpcomingEvent::select('id','strLanguageCode','strEventTitile',
            DB::raw('DATE_FORMAT(dtiEventDate,"%d/%m/%Y") as dtiEventDate'),'strEventDescription','strPageName')->findOrFail($id);
         //dd($language);
        //dd($upcoming_events);
          $language=Languages::all();
        return view('admin.upcomingevents.edit', compact('upcoming_events','language'));

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
        //dd($id);
        //dd($request->all());
        $this->validate($request, ['strLanguageCode' => 'required',
                                   'strEventTitile' => 'required',
                                   'dtiEventDate' => 'required',
                                   'strEventDescription' => 'required',
                                   'strPageName' => 'required']);
       $data['strLanguageCode'] = $request->input('strLanguageCode');
       $data['strEventTitile']=$request->input('strEventTitile');
       $data['dtiEventDate']=Carbon::createFromFormat('d/m/Y',$request->input('dtiEventDate'))->format('Y-m-d');
       $data['strEventDescription']=$request->input('strEventDescription');
        $data['strPageName']=$request->input('strPageName');
       $language = UpcomingEvent::findOrFail($id);
       //dd($data);
       $language->update($data);
      return redirect('webpanel/upcoming_event')->with('flash_message', 'Upcoming Event Updated!');
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
         UpcomingEvent::destroy($id);
        return redirect('webpanel/upcoming_event')->with('flash_message', 'Upcoming Event Deleted!');
    }
    //change status for UpcommingEvent start here developed by Harin
    
    public function upComingstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = UpcomingEvent::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}
