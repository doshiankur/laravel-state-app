<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Admin\ManagementVillageLibraries;


class ManagementofvillagelibrariesController extends Controller
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
        $managementVillageLibraries=ManagementVillageLibraries::all();

        return view('admin.managementofvillagelibraries.index',compact('languages','managementVillageLibraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        return view('admin.managementofvillagelibraries.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         //dd("hi"); 
        $this->validate($request, ['strManagementVillagelibraries'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);        
        
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strManagementVillagelibraries'] =$request->input('strManagementVillagelibraries');  
        $data['strPageName']=$request->input('strPageName');
         //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=ManagementVillageLibraries::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here       
        //dd($data);
        $aboutus = ManagementVillageLibraries::create($data);
        return redirect('webpanel/managementofvillagelibraries')->with('flash_message', 'Management of VillageLibraries added!');
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
        $managementofvillagelibraries=ManagementVillageLibraries::select('id','strManagementVillagelibraries','strLanguageCode','strPageName')->findOrFail($id);
        //dd($aboutus);
        return view('admin.managementofvillagelibraries.edit',compact('language','managementofvillagelibraries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //dd($id);
         $this->validate($request, ['strManagementVillagelibraries'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);   
        
        $data['strManagementVillagelibraries']=$request->input('strManagementVillagelibraries');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $aboutus = ManagementVillageLibraries::findOrFail($id);
        $aboutus->update($data);
        return redirect('webpanel/managementofvillagelibraries')->with('flash_message', 'Management of VillageLibraries Updated!');
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
         ManagementVillageLibraries::destroy($id);
        return redirect('webpanel/managementofvillagelibraries')->with('flash_message', 'Management of VillageLibraries Deleted!');
    }

    //change status for Management Village Libraries start here developed by Harin
    
    public function managementOfVillagestatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = ManagementVillageLibraries::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}
