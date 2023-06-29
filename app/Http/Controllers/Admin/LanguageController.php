<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Users;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("hi");
        //
        $languages=Languages::all();
        //dd($languages);
        return view('admin.languages.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("hi");
        //
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       //dd("hi"); 
        //dd($request);
        $this->validate($request, ['strLanguage' => 'required','strLanguageCode' => 'required']);

        $data['strLanguage'] = $request->input('strLanguage');
        $data['strLanguageCode']=$request->input('strLanguageCode');
    //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Languages::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here        
        $languages = Languages::create($data);
        return redirect('webpanel/languages')->with('flash_message', 'Languages Added!');
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
        //dd("hi");
        //dd($id);
         $language = Languages::select('id','strLanguage','strLanguageCode')->findOrFail($id);
         //dd($language);
        return view('admin.languages.edit', compact('language'));
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
         $this->validate($request, ['strLanguage' => 'required', 'strLanguageCode' => 'required']);

        $data['strLanguage'] = $request->input('strLanguage');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $language = Languages::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/languages')->with('flash_message', 'Languages List Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Languages::destroy($id);
        return redirect('webpanel/languages')->with('flash_message', 'Languages List Deleted!');
    }

    //Code For Get Language List HP
    public function getLanguage(){
           $languages=Languages::all();
           return response()->json([
            'status'=>200,
           'languages'=>$languages,
          'message'=>'Get All Languages successfull']);
    }

    //change status for Language Controller start here developed by Harin
    
    public function languagestatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Languages::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
    //End Code For Get Language List HP
}
