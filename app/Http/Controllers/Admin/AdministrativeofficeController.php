<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Languages;
use app\Http\Controllers\Controller;
use App\Http\Models\Admin\Administrative;


class AdministrativeofficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language=Languages::all();  
        $Administrative=Administrative::all();
        return view('admin.administrativeoffices.index',compact('language','Administrative'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();  
        $Administrative=Administrative::all();
        return view('admin.administrativeoffices.create',compact('language','Administrative'));
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
       //dd($request);
       
       $this->validate($request, ['strAdministrative'=>'required',
                                  'strLanguageCode' => 'required',
                                  'strPageName'=>'required']);  

         //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Administrative::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        $data['strAdministrative']=$request->input('strAdministrative');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
       
       //dd($data);
       
       $aboutus = Administrative::create($data);

    return redirect('webpanel/administrativeoffices')->with('flash_message', 'Administrative Offices Added!');

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
        $administrativs=Administrative::select('*')->findOrfail($id);
        //dd($activities);
        return view('admin.administrativeoffices.edit',compact('language','administrativs'));
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
        // dd($request);
         $this->validate($request, ['strAdministrative'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);   
        
        $data['strAdministrative']=$request->input('strAdministrative');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $aboutus = Administrative::findOrFail($id);
        $aboutus->update($data);
        return redirect('webpanel/administrativeoffices')->with('flash_message', 'Administrative Offices Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){       
        Administrative::destroy($id);
        return redirect('webpanel/administrativeoffices')->with('flash_message','Administrative Offices Deleted!');
    }

    //change status for Administrative start here developed by Harin
    
    public function administativeOfficestatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Administrative::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //end here
}