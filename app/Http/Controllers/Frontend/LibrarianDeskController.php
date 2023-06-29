<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\LibrarianDesk;


class LibrarianDeskController extends Controller
{
    
    public function getLibrarianDesk(Request $request){
        //echo $request;exit();
        $language=$request->language;
        $Librarians=LibrarianDesk::where('strLanguageCode', $language)->where('enmStatus','=','1')->first();
         $data['strLanguageCode']=$Librarians['strLanguageCode'];
         $data['strLibrarianFrom']=$Librarians['strLibrarianFrom'];
         $data['strLibraryMessage']=$Librarians['strLibraryMessage'];
         $data['strPhoto']=asset('/public/upload/librarian')."/".$Librarians['strPhoto'];
          //dd($data);
          return response()->json([
            'status'=>200,
            'content'=>$data,
            'message'=>'Librarian Content Successfully'
        ]);
    }
}