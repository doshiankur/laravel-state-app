<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Aboutus;
use App\Http\Models\Admin\Languages;

class AboutusController extends Controller
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
        $aboutus=Aboutus::all();
        //dd($aboutus);
        return view('admin.aboutus.index',compact('language','aboutus'));
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
        return view('admin.aboutus.create',compact('language'));
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
        $this->validate($request, ['strTitle'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strDescription'=>'required',
                                   'strPageName'=>'required']);

                                   
     
        $data['strTitle']=$request->input('strTitle');
//      $data['strDescription'] = $request->input('strDescription');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strDescription'] = trim($request->input('strDescription'));
        $data['strDescription'] = stripslashes($request->input('strDescription'));
        $data['strDescription'] = htmlspecialchars($request->input('strDescription'));
        $data['strPageName']=$request->input('strPageName');
        //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Aboutus::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        //dd($data);
        $aboutus = Aboutus::create($data);
        return redirect('webpanel/aboutus')->with('flash_message', 'Aboutus Added!');
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
        $aboutus=Aboutus::select('id','strTitle','strLanguageCode','strDescription','strPageName')->findOrFail($id);
        //dd($aboutus);
        return view('admin.aboutus.edit',compact('language','aboutus'));
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
         $this->validate($request, ['strTitle'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strDescription'=>'required',
                                   'strPageName'=>'required']);   
        
        $data['strTitle']=$request->input('strTitle');
        //$data['strDescription'] = $request->input('strDescription');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strDescription'] = trim($request->input('strDescription'));
        $data['strDescription'] = stripslashes($request->input('strDescription'));
        $data['strDescription'] = htmlspecialchars($request->input('strDescription'));
        $data['strPageName']=$request->input('strPageName');
       //dd($data);
        $aboutus = Aboutus::findOrFail($id);
        $aboutus->update($data);
        return redirect('webpanel/aboutus')->with('flash_message', 'Aboutus Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Aboutus::destroy($id);
        return redirect('webpanel/aboutus')->with('flash_message', 'Aboutus Deleted!');
    }
     //change status for Aboutus start here developed by Harin
    
    public function aboutUsstatus(Request $request)
    {
      //  dd("hi");
        if($request->ajax()){
            $data = $request->all();
            $event = Aboutus::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}