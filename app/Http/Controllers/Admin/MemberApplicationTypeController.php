<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\MemberApplicationType;

class MemberApplicationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $memberapplicationtype = MemberApplicationType::all();
        return view('admin.memberapplicationtype.index', compact('memberapplicationtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.memberapplicationtype.create');
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
          $this->validate($request, ['strApplicationType' => 'required']);
        
        $data['strApplicationType']=$request->input('strApplicationType');
       

        $languages = MemberApplicationType::create($data);
         return redirect('webpanel/member_application_type')->with('flash_message', 'Member Application Type Added!');
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
        $memberapplicationtype = MemberApplicationType::select('id','strApplicationType')->findOrFail($id);
         
        return view('admin.memberapplicationtype.edit', compact('memberapplicationtype'));
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
        $this->validate($request, ['strApplicationType' => 'required']);

       
        $data['strApplicationType']=$request->input('strApplicationType');
        $memberapplicationtype = MemberApplicationType::findOrFail($id);
        //dd($language);
        $memberapplicationtype->update($data);

        return redirect('webpanel/member_application_type')->with('flash_message', 'Member Application Type  Updated!');
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
         MemberApplicationType::destroy($id);
        return redirect('webpanel/member_application_type')->with('flash_message', 'Member Application Type Deleted!');
    }

    //change status for MemberApplication Type start here developed by Harin
    
    public function memberAppstatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $event = MemberApplicationType::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
            return $request->status;
        }
        return false;
    }
    //End here
}
