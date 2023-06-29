<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Announcement;
use App\Http\Models\Admin\Languages;
use Carbon\Carbon;
use DB;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $announcement=Announcement::all();
        //dd($languages);
        return view('admin.Announcement.index',compact('announcement'));
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
        return view('admin.Announcement.create',compact('language'));
      //  return view('admin.Announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   // dd($request);
         $this->validate($request, ['strLanguageCode' => 'required',
                                    'dtiEventDate'=>'required',
                                    'str_content' => 'required',
                                    'strPageName'=>'required']);

                      

         //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Announcement::where('strLanguage','=',$request->input('strLanguageCode'))->get();
        // $data_status=Announcement::where('strLanguage','=',$request->input('strLanguageCode'))->tosql();
        // dd($data_status);
        // return false;
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
        $data['strLanguage'] = $request->input('strLanguageCode');
        $data['dtiEventDate']=Carbon::createFromFormat('d/m/Y',$request->input('dtiEventDate'))->format('Y-m-d');
        $data['str_content']=$request->input('str_content');
         $data['strPageName']=$request->input('strPageName');
      
        $languages = Announcement::create($data);

        return redirect('webpanel/announcement')->with('flash_message', 'Announcement Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $language=Languages::all();
         $announcement = Announcement::select('id','strLanguage','strPageName','str_content',
         DB::raw('DATE_FORMAT(dtiEventDate,"%d/%m/%Y") as dtiEventDate'))->findOrFail($id);
         //dd($announcement);
          
         // DB::raw('DATE_FORMAT(dtiEventDate,"%d/%m/%Y") as dtiEventDate'),'strEventDescription')->findOrFail($id);
        return view('admin.Announcement.edit', compact('announcement','language'));

                 //dd($id);
        
         
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, ['strLanguageCode' => 'required', 
                                    'str_content' => 'required',
                                    'dtiEventDate'=>'required',
                                    'strPageName'=>'required']);

        $data['strLanguage'] = $request->input('strLanguageCode');
        $data['str_content']=$request->input('str_content');
         $data['strPageName']=$request->input('strPageName');
        $data['dtiEventDate']=Carbon::createFromFormat('d/m/Y',$request->input('dtiEventDate'))->format('Y-m-d');
        $language = Announcement::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/announcement')->with('flash_message', 'Announcement Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
       
        //
         Announcement::destroy($id);
        return redirect('webpanel/announcement')->with('flash_message', 'Announcement Deleted!');
    }
    //change status for announcement start here developed by Harin
    
    public function announcementstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Announcement::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}
