<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\LibrarianDesk;
use App\Http\Models\Admin\Languages;
use Intervention\Image\ImageManagerStatic as Image;

class LibrarianDeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $librarianDesk=LibrarianDesk::all();
        //dd($librarianDesk);
        return view('admin.librariandesks.index',compact('librarianDesk'));
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
        return view('admin.librariandesks.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  //dd("hi"); 
       ini_set('memory_limit','256M');
       $data = $request->file();
       //dd($data);
        //dd($request);
        $this->validate($request, ['strLibrarianFrom' => 'required',
                                    'strLanguageCode' => 'required',
                                    'strLibraryMessage'=>'required',
                                    'strPhoto'=>'required',
                                    'strPageName'=>'required']);
   

        if($data['strPhoto']){
           $file_name = time()."_".$data['strPhoto']->getClientOriginalName();
           $data['strPhoto']->move(base_path() . '/public/upload/librarian',$file_name);
           $data['strPhoto']=$file_name;           
      }
        $data['strLibraryMessage']=$request->input('strLibraryMessage');
        $data['strLibrarianFrom'] = $request->input('strLibrarianFrom');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
          //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=LibrarianDesk::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here 
        //dd($data);
        $languages = LibrarianDesk::create($data);
        return redirect('webpanel/librarian_desk')->with('flash_message', 'Librarian Desk added!');
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
       // dd($id);
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
         $librarianDesk=LibrarianDesk::select('id','strLibrarianFrom','strLanguageCode',
                                             'strLibraryMessage','strPhoto','strPageName')->findOrFail($id);
         //dd($librarianDesk);
         //echo ($librarianDesk['strLanguageCode']);exit;
          $language=Languages::all();
         return view('admin.librariandesks.edit',compact('librarianDesk','language'));
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
         ini_set('memory_limit','256M');
       $data = $request->file();
       //dd($request);
         $this->validate($request, ['strLibrarianFrom' => 'required',
                                    'strLanguageCode' => 'required',
                                    'strLibraryMessage'=>'required',
                                    'strPageName'=>'required']);     
        
        if(isset($data['strPhoto']) && !empty($data['strPhoto'])) {
           $file_name = time()."_".$data['strPhoto']->getClientOriginalName();
           $data['strPhoto']->move(base_path() . '/public/upload/librarian',$file_name);
           $data['strPhoto']=$file_name;           
        }
        
        $data['strLibraryMessage']=$request->input('strLibraryMessage');
        $data['strLibrarianFrom'] = $request->input('strLibrarianFrom');
        $data['strLanguageCode']=$request->input('strLanguageCode');
         $data['strPageName']=$request->input('strPageName');        
        //dd($data);
        
         $language = LibrarianDesk::findOrFail($id);
        //dd($language);
        $language->update($data);
        return redirect('webpanel/librarian_desk')->with('flash_message', 'Librarian Desk Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        LibrarianDesk::destroy($id);
        return redirect('webpanel/librarian_desk')->with('flash_message', 'Librarian Desk Deleted!');
    }

    //change status for LibrarianDesk Controller start here developed by Harin
    
    public function librarianDeskstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = LibrarianDesk::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //end Here
}
