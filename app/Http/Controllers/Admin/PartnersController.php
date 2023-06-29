<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\Admin\Partners;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Languages;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $partners=Partners::all();
        return view('admin.partners.index',compact('partners'));
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
        return view('admin.partners.create',compact('language'));
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
         ini_set('memory_limit','256M');
       $data = $request->file();
       //dd($data);
        //dd($request);
        $this->validate($request, ['strPartnerURL' => 'required',
                                   'strLanguageCode' => 'required',
                                   'strPartnerLogo'=>'required']);
   

        if($data['strPartnerLogo']){
           $file_name = time()."_".$data['strPartnerLogo']->getClientOriginalName();
           $data['strPartnerLogo']->move(base_path() . '/public/upload/partners',$file_name);
           $data['strPartnerLogo']=$file_name;           
      }
        $data['strPartnerURL']=$request->input('strPartnerURL');
        $data['strLanguageCode']=$request->input('strLanguageCode');
              //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=Partners::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here       
   
        //dd($data);
        $languages = Partners::create($data);
        return redirect('webpanel/partners')->with('flash_message', 'Partners  Desk Added!');
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
        $partnersDesk=Partners::select('id','strPartnerURL','strLanguageCode','strPartnerLogo')->findOrFail($id);
         
          $language=Languages::all();
         return view('admin.partners.edit',compact('partnersDesk','language'));
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
       //dd($request);
         $this->validate($request, ['strPartnerURL' => 'required',
                                   'strLanguageCode' => 'required',
                                   'strPartnerLogo'=>'required']);
   

        if(isset($data['strPartnerLogo']) && !empty($data['strPartnerLogo'])) {
           $file_name = time()."_".$data['strPartnerLogo']->getClientOriginalName();
           $data['strPartnerLogo']->move(base_path() . '/public/upload/partners',$file_name);
           $data['strPartnerLogo']=$file_name;           
        }

        $data['strPartnerURL']=$request->input('strPartnerURL');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        //dd($data);

        $language = Partners::findOrFail($id);
        $language->update($data);

        return redirect('webpanel/partners')->with('flash_message', 'Partners Desk Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partners::destroy($id);
        return redirect('webpanel/partners')->with('flash_message', 'Partners Desk Deleted!');
    }
    //change status for partners start here developed by Harin
    
    public function partnerStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = Partners::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}
