<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Admin\Functions;

class FunctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages=Languages::all();
        $funcations=Functions::all();
        return view('admin.functions.index',compact('languages','funcations'));

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
        return view('admin.functions.create',compact('language'));
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
        //dd("hi");
        //dd($request);
        $this->validate($request,['strFunction'=>'required',
                                  'strLanguageCode'=>'required',
                                  'strPageName'=>'required']);

        $data['strFunction']=$request->input('strFunction');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
            //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Functions::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here

        //dd($data);
        $functions=Functions::create($data);

        return redirect('webpanel/functions')->with('flash_message','Functions Added!!');
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
        $functions=Functions::findOrfail($id);
        //dd($functions);
        return view('admin.functions.edit',compact('language','functions'));
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
         $this->validate($request,['strFunction'=>'required',
                                   'strLanguageCode'=>'required',
                                   'strPageName'=>'required']);  

         $data['strFunction']=$request->input('strFunction');
         $data['strLanguageCode']=$request->input('strLanguageCode');
         $data['strPageName']=$request->input('strPageName');

         $functions=Functions::findOrfail($id);
         //dd($functions);
         $functions->update($data); 
         return redirect('webpanel/functions')->with('flash_message','Functions Updated!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

          Functions::destroy($id);
          return redirect('webpanel/functions')->with('flash_message','Functions Deleted!!');
    }

    //change status for function controller start here developed by Harin
    
    public function functionStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Functions::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}