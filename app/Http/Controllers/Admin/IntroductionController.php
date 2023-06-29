<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Introduction;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Users;

class IntroductionController extends Controller
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
        $introduction=Introduction::all();
        //dd($languages);
        return view('admin.Introduction.index',compact('introduction'));
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
        $language=Languages::all();
        return view('admin.Introduction.create',compact('language'));
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
        $this->validate($request, ['strLanguageCode' => 'required',
                                    'str_introcontent' => 'required',
                                    'strPageName' => 'required']);
                                    //strLanguageCode
        $data['strLanguage'] = $request->input('strLanguageCode');
        $data['str_introcontent']=$request->input('str_introcontent');
        $data['strPageName']=$request->input('strPageName');

             //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Introduction::where('strLanguage','=',$request->input('strLanguage'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        $languages = Introduction::create($data);
        return redirect('webpanel/introduction')->with('flash_message', 'Content Added!');
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
        $language=Languages::all();
         $introduction = Introduction::select('id','strLanguage','str_introcontent','strPageName')->findOrFail($id);
         //dd($language);
        return view('admin.Introduction.edit', compact('introduction','language'));
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
         $this->validate($request, ['strLanguageCode' => 'required', 
                                    'str_introcontent' => 'required',
                                    'strPageName' => 'required']);

        $data['strLanguage'] = $request->input('strLanguageCode');
        //dd($language);
        $data['str_introcontent']=$request->input('str_introcontent');
        $data['strPageName']=$request->input('strPageName');
        $language = Introduction::findOrFail($id);
        
        $language->update($data);
        //dd($request);
        return redirect('webpanel/introduction')->with('flash_message', 'Introduction Updated!');
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
        Introduction::destroy($id);
        return redirect('webpanel/introduction')->with('flash_message', 'Introduction Deleted!');
    }  
    
    //change status for Introduction start here developed by Harin
    
     public function changeIntroductionstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Introduction::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}