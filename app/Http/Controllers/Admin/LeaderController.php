<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Leaders;
use App\Http\Models\Admin\Languages;


class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leaders=Leaders::all();
        //dd($leaders);
        return view('admin.leaders.index',compact('leaders'));
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
        return view('admin.leaders.create',compact('language'));
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
       ini_set('memory_limit','256M');
       $data = $request->file();
       //dd($data);
        //dd($request);
        $this->validate($request, ['strLeadersName' => 'required','strLanguageCode' => 'required','strDesignation'=>'required','strLeadersPhoto'=>'required','strPlace'=>'required',
            'strPageName'=>'required','intDisplay'=>'required']);
   
//dd($data['strLeadersPhoto']);
        if($data['strLeadersPhoto']){
           $file_name = time()."_".$data['strLeadersPhoto']->getClientOriginalName();
           $data['strLeadersPhoto']->move(base_path() . '/public/upload/leaders',$file_name);
           $data['strLeadersPhoto']=$file_name;           
      }
        $data['strLeadersName']=$request->input('strLeadersName');
        $data['strDesignation'] = $request->input('strDesignation');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPlace']=$request->input('strPlace');
        $data['strPageName']=$request->input('strPageName');
        $data['intDisplay']=$request->input('intDisplay');
          //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Leaders::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here        
        
        //dd($data);
        $languages = Leaders::create($data);
        return redirect('webpanel/leaders')->with('flash_message', 'Leaders added!');
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
        //dd('hi') ;
         $leadersDesk=Leaders::select('id','strLeadersName','strDesignation','strLanguageCode','strLeadersPhoto','strPlace','strPageName','intDisplay')->findOrFail($id);
         //dd('hi') ;
          $language=Languages::all();
         return view('admin.leaders.edit',compact('leadersDesk','language'));
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
        
         ini_set('memory_limit','256M');
       $data = $request->file();
       //dd('hi');
         //dd($request);
         $this->validate($request, ['strLeadersName' => 'required',
                                    'strLanguageCode' => 'required',
                                    'strDesignation'=>'required',
                                    'strLeadersPhoto'=>'required',
                                    'strPlace'=>'required',
                                    'strPageName'=>'required',
                                    'intDisplay'=>'required']);
   

        if(isset($data['strLeadersPhoto']) && !empty($data['strLeadersPhoto'])) {
           $file_name = time()."_".$data['strLeadersPhoto']->getClientOriginalName();
           $data['strLeadersPhoto']->move(base_path() . '/public/upload/leaders',$file_name);
           $data['strLeadersPhoto']=$file_name;           
        }

        $data['strLeadersName']=$request->input('strLeadersName');
        $data['strDesignation'] = $request->input('strDesignation');
        $data['strLanguageCode']=$request->input('strLanguageCode');
         $data['strPlace']=$request->input('strPlace');
         $data['strPageName']=$request->input('strPageName');
         $data['intDisplay']=$request->input('intDisplay');
        //dd($data);

        $language = Leaders::findOrFail($id);
        $language->update($data);

        return redirect('webpanel/leaders')->with('flash_message', 'Leaders Desk Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        Leaders::destroy($id);
        return redirect('webpanel/leaders')->with('flash_message', 'Leaders Desk Deleted!');
    }
    //change status for Leader controller start here developed by Harin
    
    public function leaderstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Leaders::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}