<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\ReadingCorner;
use App\Http\Models\Admin\Languages;

class ReadingCornerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $readingcorner=ReadingCorner::all();
        //dd($readigcorner);
        return view('admin.ReadingCorner.index',compact('readingcorner'));
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
        return view('admin.ReadingCorner.create',compact('language'));
      //  return view('admin.Announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    //dd($request);
         $this->validate($request, ['strLanguageCode' => 'required',
                                    'strReadingCorner' => 'required',
                                   'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strReadingCorner']=$request->input('strReadingCorner');
        $data['strPageName']=$request->input('strPageName');
       //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=ReadingCorner::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   

        $languages = ReadingCorner::create($data);
        return redirect('webpanel/readingcorner')->with('flash_message', 'Reading Corner Added!');
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
         $readingcorner = ReadingCorner::select('id','strLanguageCode',
                                              'strReadingCorner','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.ReadingCorner.edit', compact('readingcorner','language'));

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
                                   'strReadingCorner' => 'required',
                                   'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strReadingCorner']=$request->input('strReadingCorner');
        $data['strPageName']=$request->input('strPageName');
        $language = ReadingCorner::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/readingcorner')->with('flash_message', 'Reading Corner Updated!');
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
         ReadingCorner::destroy($id);
        return redirect('webpanel/readingcorner')->with('flash_message', 'Reading Corner Deleted!');
    }
    //change status for ReadingCorner start here developed by Harin
    
    public function readingCornerstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = ReadingCorner::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}
