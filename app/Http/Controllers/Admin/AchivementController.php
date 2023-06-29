<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Achievement;
use App\Http\Models\Admin\Languages;

class AchivementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $language=Languages::all();
         //dd($language);
         $achievement=Achievement::all();
         //dd($achievement);
         return view('admin.achievement.index',compact('language','achievement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        $Achievement=Achievement::all();
        //dd($language);
        return view('admin.achievement.create',compact('language','Achievement'));
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
        $this->validate($request, ['strTitle'=>'required',
                                    'strLanguageCode' => 'required',
                                    'strDescription'=>'required',
                                    'strPageName'=>'required']); 
       
      
                                    
        $data['strTitle']=$request->input('strTitle');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strDescription'] = trim($request->input('strDescription'));
        $data['strDescription'] = stripslashes($request->input('strDescription'));
        $data['strDescription'] = htmlspecialchars($request->input('strDescription'));
        $data['strPageName']=$request->input('strPageName');
         //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Achievement::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        //dd($data);
        $achievement = Achievement::create($data);
        return redirect('webpanel/achievement')->with('flash_message', 'Achievement Added!');
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
        $language=Languages::all();
        $achievement=Achievement::select('id','strTitle','strLanguageCode','strDescription','strPageName')->findOrFail($id);
        //dd($achievement);
        return view('admin.achievement.edit',compact('language','achievement'));
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
    
     $this->validate($request, ['strTitle'=>'required',
                                'strLanguageCode' => 'required',
                                'strDescription'=>'required',
                                'strPageName'=>'required']);   

        $data['strTitle']=$request->input('strTitle');        
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strDescription'] = trim($request->input('strDescription'));
        $data['strDescription'] = stripslashes($request->input('strDescription'));
        $data['strDescription'] = htmlspecialchars($request->input('strDescription'));
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $achievement = Achievement::findOrFail($id);
        $achievement->update($data);
        return redirect('webpanel/achievement')->with('flash_message', 'Achievement Updated!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Achievement::destroy($id);
        return redirect('webpanel/achievement')->with('flash_message', 'Achievement Deleted!');
    }

    //change status for Achievement start here developed by Harin    
     public function achievementstatus(Request $request)
     {
       //  dd("hi");
         if($request->ajax()){
             $data = $request->all();
             $event = Achievement::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
             return $request->status;
         }
         return false;
     }
     //End here
}