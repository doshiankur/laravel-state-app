<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\KnowledgeCenter;
use App\Http\Models\Admin\KnowledgeCategory;
use App\Http\Models\Admin\Languages;



class KnowledgeCenterController extends Controller
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
        $knowledgecenter=KnowledgeCenter::all();
        //dd($knowledgecenter);
        return view('admin.knowledgecenter.index',compact('languages','knowledgecenter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language=Languages::all();
        $category=KnowledgeCategory::all();
        //dd($category[0]->strCategory);
        return view('admin.knowledgecenter.create',compact('language','category'));

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
                                    'strTitle'=>'required']);  

        
        //dd($request);
        $data['strLanguageCode']=$request->input('strLanguageCode');
        //dd($data);
        
        $data['strCategoryCode']=$request->input('strCategory');
        $data['strTitle']=$request->input('strTitle');
        //dd($data);
        $knowledgecenter = KnowledgeCenter::create($data);
        //dd($data);
        return redirect('webpanel/knowledgecenter')->with('flash_message', 'Knowledge Center Category Added!');
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
        $category=KnowledgeCategory::all();
        $knowledgecenter=KnowledgeCenter::select('id','strLanguageCode','strCategoryCode','strTitle')->findOrFail($id);
        //dd($knowledgecenter);
        return view('admin.knowledgecenter.edit',compact('language','category','knowledgecenter'));
    
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
                                    'strTitle'=>'required',
                                        ]);   
        //dd($data);
        
                                    
         $data['strLanguageCode']=$request->input('strLanguageCode'); 
        $data['strCategoryCode']=$request->input('strCategory');
        $data['strTitle']=$request->input('strTitle');
         //dd($data);
        $knowledgecenter = KnowledgeCenter::findOrFail($id);
        //dd($data);
        $knowledgecenter->update($data);
        //dd($data);
        return redirect('webpanel/knowledgecenter')->with('flash_message', 'Knowledge Center Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KnowledgeCenter::destroy($id);
        return redirect('webpanel/knowledgecenter')->with('flash_message', 'Knowledge Center Category Deleted!');
    }

    //change status for Knowledge Center start here developed by Harin    
     public function knowledgecenterstatus(Request $request)
     {
         //dd("hi");
         if($request->ajax()){
             $data = $request->all();
             $event = KnowledgeCenter::where('id',$data['id'])->update(['enmStatus'=>$data['status']]);
             return $request->status;
         }
         return false;
     }

}
