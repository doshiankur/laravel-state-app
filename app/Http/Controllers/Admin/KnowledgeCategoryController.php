<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Admin\KnowledgeCategory;
use App\Http\Models\Admin\Languages;
use App\Http\Controllers\Controller;


class KnowledgeCategoryController extends Controller
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
        //dd($languages);
        $knowledgecategory=KnowledgeCategory::all();
        //dd($knowledgecategory);
        return view('admin.knowledgecategory.index',compact('languages','knowledgecategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        return view('admin.knowledgecategory.create',compact('language'));
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
       $this->validate($request, ['strLanguageCode' =>'required',
                                    'strCategory'=>'required',
                                    'strDetail'=>'required']);  

        
        
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strCategory']=$request->input('strCategory');
        $data['strDetail']=$request->input('strDetail');
        //dd($data);
        $aboutus = KnowledgeCategory::create($data);
        return redirect('webpanel/knowledgecategory')->with('flash_message', 'Knowledge Category Added!');
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
        $language=Languages::all();
        $knowledgecategory=KnowledgeCategory::select('id','strLanguageCode','strCategory','strDetail')->findOrFail($id);
        //dd($knowledgecategory);
        return view('admin.knowledgecategory.edit',compact('language','knowledgecategory'));
    
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
        //dd($request);
         $this->validate($request, ['strLanguageCode' => 'required',
                                    'strCategory'=>'required',
                                    'strDetail'=>'required',
                                        ]);   
        
        
        $data['strLanguageCode']=$request->input('strLanguageCode');
        $data['strCategory']=$request->input('strCategory');
        $data['strDetail']=$request->input('strDetail');
        //dd($data);
        $knowledgecategory = KnowledgeCategory::findOrFail($id);
        $knowledgecategory->update($data);
        return redirect('webpanel/knowledgecategory')->with('flash_message', 'Knowledge Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KnowledgeCategory::destroy($id);
        return redirect('webpanel/knowledgecategory')->with('flash_message', 'Knowledge Category Deleted!');
    }

    //change status for Knowledge Category start here developed by Harin    
     public function knowledgecategorystatus(Request $request)
     {
       //  dd("hi");
         if($request->ajax()){
             $data = $request->all();
             $event = KnowledgeCategory::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
             return $request->status;
         }
         return false;
     }
     
}
