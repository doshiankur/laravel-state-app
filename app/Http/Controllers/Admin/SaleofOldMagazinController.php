<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\SaleOldMagazine;
use App\Http\Models\Admin\Languages;

class SaleofOldMagazinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $saleofoldmagazines=SaleOldMagazine::all();
        //dd($readigcorner);
        return view('admin.SalesOfOldMagazin.index',compact('saleofoldmagazines'));
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
        return view('admin.SalesOfOldMagazin.create',compact('language'));
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
                                    'strSaleofOldMagazines' => 'required',
                                    'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strSaleofOldMagazines']=$request->input('strSaleofOldMagazines');
        $data['strPageName']=$request->input('strPageName');
      //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=SaleOldMagazine::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here   
        $languages = SaleOldMagazine::create($data);
        return redirect('webpanel/saleofoldmagazines')->with('flash_message','Old Magazine Sales Data  Added!');
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
         $saleofoldmagazines = SaleOldMagazine::select('id','strLanguageCode','strSaleofOldMagazines','strPageName')->findOrFail($id);
         //dd($language);
          $language=Languages::all();
        return view('admin.SalesOfOldMagazin.edit', compact('saleofoldmagazines','language'));

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
                                   'strSaleofOldMagazines' => 'required',
                                   'strPageName'=>'required']);

        $data['strLanguageCode'] = $request->input('strLanguageCode');
        $data['strSaleofOldMagazines']=$request->input('strSaleofOldMagazines');
        $data['strPageName']=$request->input('strPageName');
        $language = SaleOldMagazine::findOrFail($id);
        //dd($language);
        $language->update($data);

        return redirect('webpanel/saleofoldmagazines')->with('flash_message', 'Old Magazine Sales Data Updated!');
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
         SaleOldMagazine::destroy($id);
        return redirect('webpanel/saleofoldmagazines')->with('flash_message', 'Old Magazine Sales Data Deleted!');
    }

    //change status for Sale old magazine start here developed by Harin
    
      public function saleOfOldstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = SaleOldMagazine::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End Here
}

