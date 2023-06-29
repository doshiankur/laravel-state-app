<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\Http\Models\Users;
use Illuminate\Http\Request;
use App\Http\Models\Languages;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {  //dd("hi");
        $users = Users::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required', 'password' => 'required']);

        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = Users::create($data);

        return redirect('webpanel/users')->with('flash_message', 'User Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
      $user = Users::select('id', 'name', 'email','strLanguage','strLanguageKnows','enmUserType')->findOrFail($id);//dd($user);        
        $language=Languages::all();

        return view('admin.users.edit', compact('user','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        //$this->validate($request, ['name' => 'required', 'email' => 'required']);

        /*$data = $request->except('password');
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }*/

        $data['strLanguage']=$request->sel_lang;
        $data['enmUserType']=$request->user_type;
        $final_lang='';
        //$data['']=$request->sel_mlang;
        //echo sizeof($request->sel_mlang);exit;
        if(isset($request->sel_mlang) && !empty($request->sel_mlang)){
          for($i=0;$i<sizeof($request->sel_mlang);$i++){
             $final_lang .=$request->sel_mlang[$i].",";
            }
            $data['strLanguageKnows']=substr($final_lang, 0, -1);
        }
        //dd($final_lang);
        //dd(substr($final_lang, 0, -1));
        
        //dd($id);
        //dd($data);
        $user = Users::findOrFail($id);
        //dd($user);
        $user->update($data);

        return redirect('webpanel/users')->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Users::destroy($id);
        return redirect('webpanel/users')->with('flash_message', 'User Deleted!');
    }
}
