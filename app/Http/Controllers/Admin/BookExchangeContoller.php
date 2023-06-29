<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Languages;
use App\Http\Models\Admin\BookExchange;

class BookExchangeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $languages=Languages::all();
        $BookExchanges=BookExchange::all();
        return view('admin.bookexchanges.index',compact('languages','BookExchanges'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        return view('admin.bookexchanges.create',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd("hi"); 
       //dd($request);
       $this->validate($request, ['strBookExchange'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);  
      //check the data as per the language code,if language code is avaible into database table then set enmStatus=0  
        $data_status=BookExchange::where('strLanguageCode','=',$request->input('strLanguageCode'))->get();
        if($data_status){
           $data['enmStatus']='0';    
         }
      //end here
      
        $data['strBookExchange']=$request->input('strBookExchange');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $bookexchanges = BookExchange::create($data);
        return redirect('webpanel/bookexchanges')->with('flash_message', 'BookExchange Added!');
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
        //dd($id);
        $language=Languages::all();
        $bookexchange=BookExchange::select('*')->findOrfail($id);
        //dd($activities);
        return view('admin.bookexchanges.edit',compact('language','bookexchange'));
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
        // dd($id);
         $this->validate($request, ['strBookExchange'=>'required',
                                   'strLanguageCode' => 'required',
                                   'strPageName'=>'required']);   
        
        $data['strBookExchange']=$request->input('strBookExchange');
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strPageName']=$request->input('strPageName');
        //dd($data);
        $book = BookExchange::findOrFail($id);
        $book->update($data);
        return redirect('webpanel/bookexchanges')->with('flash_message', 'BookExchanges Updated!');
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
        BookExchange::destroy($id);
        return redirect('webpanel/bookexchanges')->with('flash_message','BookExchanges Deleted!');
    }
    //change status for BookExchange start here developed by Harin
    
    public function changeBookxstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = BookExchange::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
    
}
