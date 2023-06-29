<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Admin\Membership;

//use App\Http\Models\Users;


class PaymentController extends Controller
{
    

     public function index(Request $request){
    
      $data=Membership::select('strMembershipID','seq_id')->where('strMembershipID',$request['membership_id'])->OrderBy('id')->first();
     
      $id =$data->seq_id;
      $transaction_id = '000'.$id.date('dmY');
     $data_array=array(
      'user_id'=>$data->strMembershipID,
      'transaction_id' => $transaction_id
      
       
     );

           return response()->json([
            'status'=>200,
             'data'=>$data_array,
           'message'=>'Payment Successfull']);
    }
    //END CODE FOR GET INTRODUCTION CONTENT 
}
