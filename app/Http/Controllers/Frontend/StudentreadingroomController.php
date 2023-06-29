<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Studentreadingroom;
use App\Http\Controllers\Controller;

class StudentreadingroomController extends Controller
{
    public function getStudentReadingRoom(Request $request){            
            $language=$request->language;
            $student=Studentreadingroom::where('strLanguageCode',$language)->where('enmStatus','=','1')->first();
            return response()->json([
            'status'=>200,
            'content'=>$student,
            'message'=>'Student Reading Room Content Successfully']);

    }
}
