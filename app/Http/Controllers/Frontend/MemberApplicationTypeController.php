<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\MemberApplicationType;
class MemberApplicationTypeController extends Controller
{
    //FOR GET MemberApplicationType KV

     public function getMemberApplicationType(){
           $MemberApplicationType=MemberApplicationType::where('enmStatus','=','1')->get();
           return response()->json([
            'status'=>200,
           'MemberApplicationType'=>$MemberApplicationType,
          'message'=>'Getting All MemberApplicationType successfully']);
    }
    //END CODE FOR GET MemberApplicationType
}
