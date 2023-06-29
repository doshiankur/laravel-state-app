<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\BookExchange;
use App\Http\Controllers\Controller;

class BookExchangeController extends Controller
{
    //
    public function getBookExchange(Request $request){
          $language=$request->language;
          $bookExcahange=BookExchange::where('strLanguageCode',$language)->where('enmStatus','=','1')->first(); 
          return response()->json([
          	'status'=>200,
            'content'=>$bookExcahange,
            'message'=>'BookExcahange Content Successfully']);      
    }
}