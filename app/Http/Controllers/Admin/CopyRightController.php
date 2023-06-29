<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Admin\Copyright;

class CopyRightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language=Languages::all();
        $copyright=CopyRight::all();
        return view('admin.copyrights.index',compact('language','copyright'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        return view('admin.copyrights.create',compact('language'));
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
        $this->validate($request, ['strCopyright'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);
                                   

           //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Copyright::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        $data['strCopyright']=$request->input('strCopyright');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');

        //dd($data);
        
        $copyrights = Copyright::create($data);
        
        return redirect('webpanel/copyrights')->with('flash_message', 'CopyRight Added!');
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
        //dd($id);
        $language=Languages::all();
        $copyright=Copyright::select('id','strLanguageCode','strCopyright','strPageName')->findOrFail($id);
        //dd($aboutus);
        return view('admin.copyrights.edit',compact('language','copyright'));
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
       // dd($id);
         $this->validate($request, ['strCopyright'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);   
        
        $data['strCopyright']=$request->input('strCopyright');        
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        
      //  dd($data);
        
        $copyrights =Copyright::findOrFail($id);
        $copyrights->update($data);
        return redirect('webpanel/copyrights')->with('flash_message', 'CopyRight Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Copyright::destroy($id);
        return redirect('webpanel/copyrights')->with('flash_message', 'CopyRight Deleted!');
    }
    //change status for Copyright start here developed by Harin
    
    public function copyRightstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Copyright::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
    
}