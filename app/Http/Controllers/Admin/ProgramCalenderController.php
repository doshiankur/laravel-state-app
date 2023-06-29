<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\ProgramCalender;
use App\Http\Models\Admin\Languages;

class ProgramCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $language=Languages::all();
         //dd($language);
         $programcalender=ProgramCalender::all();
         //dd($progrmcalender);
         return view('admin.programcalender.index',compact('language','programcalender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        //dd($language);
        return view('admin.programcalender.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request);
        $this->validate($request, ['strMonths'=>'required',
                                    'strTitle'=>'required',
                                    'strLanguageCode' => 'required',
                                    'strPageName'=>'required']);

        $data['strMonths']=$request->input('strMonths');
        $data['strTitle']=$request->input('strTitle');
        $data['strLanguageCode']=$request->input('strLanguageCode');
         $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $programcalender = ProgramCalender::create($data);
        return redirect('webpanel/programcalender')->with('flash_message', 'Program Calender Added!');
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
        $programcalender=ProgramCalender::select('id','strMonths','strTitle','strLanguageCode','strPageName')->findOrFail($id);
        //dd($programcalender);
        return view('admin.programcalender.edit',compact('language','programcalender'));
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
    // dd($request->all());
     $this->validate($request, ['strMonths'=>'required',
                                'strTitle'=>'required',
                                'strLanguageCode' => 'required','strPageName'=>'required'
                                ]);   

        $data['strMonths']=$request->input('strMonths');
        $data['strTitle']=$request->input('strTitle');        
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $programcalender = ProgramCalender::findOrFail($id);
        $programcalender->update($data);
        return redirect('webpanel/programcalender')->with('flash_message', 'Program Calender Updated!');
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
        ProgramCalender::destroy($id);
        return redirect('webpanel/programcalender')->with('flash_message', 'Program Calender Deleted!');
    }
    //change status for Achievement start here developed by Harin    
    public function programCalenderstatus(Request $request)
    {
      //  dd("hi");
        if($request->ajax()){
            $data = $request->all();
            $event = ProgramCalender::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}
