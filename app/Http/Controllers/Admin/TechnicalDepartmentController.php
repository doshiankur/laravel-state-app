<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\TechnicalDepartment;
use App\Http\Models\Admin\Languages;
class TechnicalDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $technicaldepartment = TechnicalDepartment::all();
        return view('admin.technicaldepartment.index', compact('technicaldepartment'));
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
        return view('admin.technicaldepartment.create',compact('language'));
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
                                   'strTechnical' => 'required',
                                   'strPageName'=>'required']);
         
        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strTechnical']=$request->input('strTechnical');
        $data['strPageName']=$request->input('strPageName');
           //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=TechnicalDepartment::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   

        $languages = TechnicalDepartment::create($data);
         return redirect('webpanel/technicaldepartment')->with('flash_message', 'Technical Department Added!');
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
        $technicaldepartment = TechnicalDepartment::select('id','strLanguageCode','strTechnical','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.technicaldepartment.edit', compact('technicaldepartment','language'));
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
                                     'strTechnical' => 'required',
                                     'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strTechnical']=$request->input('strTechnical');
        $data['strPageName']=$request->input('strPageName');
        $language = TechnicalDepartment::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/technicaldepartment')->with('flash_message', 'Tecnical Department Updated!');
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
           TechnicalDepartment::destroy($id);
        return redirect('webpanel/technicaldepartment')->with('flash_message', 'Technical Department Deleted!');
    }
    //change status for Technical department start here developed by Harin
    
    public function studentTechnicalDeptstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = TechnicalDepartment::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}
