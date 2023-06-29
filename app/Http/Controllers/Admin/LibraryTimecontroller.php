<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\libraryTime;
use App\Http\Models\Admin\Languages;

class LibraryTimecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $libraryTime=libraryTime::all();
        //dd($languages);
        return view('admin.libraryTime.index',compact('libraryTime'));
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
        return view('admin.libraryTime.create',compact('language'));
        
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
        $this->validate($request, ['strLanguageCode' => 'required',
                                   'str_content' => 'required',
                                   'strPageName'=>'required']);

        $data['strLanguage'] = $request->input('strLanguageCode');
        $data['str_content']=$request->input('str_content');
          $data['strPageName']=$request->input('strPageName');
     //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=libraryTime::where('strLanguage','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here 
        $languages = libraryTime::create($data);
        return redirect('webpanel/libraryTime')->with('flash_message', 'LibraryTime Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\libraryTime  $libraryTime
     * @return \Illuminate\Http\Response
     */
    public function show(libraryTime $libraryTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\libraryTime  $libraryTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //
         $libraryTime = libraryTime::select('id','strLanguage','str_content','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.libraryTime.edit', compact('libraryTime','language'));

                 //dd($id);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\libraryTime  $libraryTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['strLanguageCode' => 'required',
                                   'str_content' => 'required',
                                   'strPageName'=>'required']);

        $data['strLanguage'] = $request->input('strLanguageCode');
        $data['str_content']=$request->input('str_content');
        $data['strPageName']=$request->input('strPageName');  
        $language = libraryTime::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/libraryTime')->with('flash_message', 'LibraryTime Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\libraryTime  $libraryTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         libraryTime::destroy($id);
        return redirect('webpanel/libraryTime')->with('flash_message', 'Library Time Deleted!');
    }
    //change status for LibrarianDesk start here developed by Harin
    
    public function libraryTimestatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = libraryTime::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}
