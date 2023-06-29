<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\ReferenceService;
use App\Http\Models\Admin\Languages;

class ReferenceServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $referenceservice=ReferenceService::all();
        //dd($readigcorner);
        return view('admin.ReferenceService.index',compact('referenceservice'));
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
        return view('admin.ReferenceService.create',compact('language'));
      //  return view('admin.Announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    //print_r($request) 
       // dd($request);
         $this->validate($request, ['strLanguageCode' => 'required',
                                    'strReferenceService' => 'required',
                                    'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strReferenceService']=$request->input('strReferenceService');
        $data['strPageName']=$request->input('strPageName');
          //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=ReferenceService::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   
         
        $languages = ReferenceService::create($data);
        return redirect('webpanel/referenceservice')->with('flash_message', 'Reference Service Added!');
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
         $referenceservice = ReferenceService::select('id','strLanguageCode',
                                                      'strReferenceService','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.ReferenceService.edit', compact('referenceservice','language'));

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
                                  'strReferenceService' => 'required',
                                  'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strReferenceService']=$request->input('strReferenceService');
        $data['strPageName']=$request->input('strPageName');
        $language = ReferenceService::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/referenceservice')->with('flash_message', 'Reference Service  Updated!');
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
         ReferenceService::destroy($id);
        return redirect('webpanel/referenceservice')->with('flash_message', 'Reference Service Deleted!');
    }
    //change status for Referance Service start here developed by Harin
    
    public function referanceServicestatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = ReferenceService::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}
