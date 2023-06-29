<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Studentreadingroom;
use App\Http\Models\Admin\Languages;

class StudentReadingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $studentreadingroom = Studentreadingroom::all();
        return view('admin.studentreadingroom.index', compact('studentreadingroom'));
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
        return view('admin.studentreadingroom.create',compact('language'));
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
                                    'strStudentreadingroom' => 'required',
                                    'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strStudentreadingroom']=$request->input('strStudentreadingroom');
        $data['strPageName']=$request->input('strPageName');
              //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Studentreadingroom::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   
       

        $languages = Studentreadingroom::create($data);
         return redirect('webpanel/studentreadingroom')->with('flash_message', 'Student Reading Room Added!');
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
         $studentreadingroom = Studentreadingroom::select('id','strLanguageCode','strStudentreadingroom','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.studentreadingroom.edit', compact('studentreadingroom','language'));
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
                                   'strStudentreadingroom' => 'required',
                                   'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strStudentreadingroom']=$request->input('strStudentreadingroom');
        $data['strPageName']=$request->input('strPageName');
        $language = Studentreadingroom::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/studentreadingroom')->with('flash_message', 'Student Reading Room Updated!');
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
         Studentreadingroom::destroy($id);
        return redirect('webpanel/studentreadingroom')->with('flash_message', 'Student Reading Room Deleted!');
    }
    //change status for Student studing room start here developed by Harin
    
    public function studentReadingstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Studentreadingroom::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}

