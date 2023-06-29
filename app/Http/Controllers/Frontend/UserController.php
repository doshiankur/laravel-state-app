<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Aboutus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserVerification;
use App\Http\Controllers\VerificationController;
use App\User;
use Mail;
use App\Http\Models\Admin\Membership;

class UserController extends Controller
{

   //For token generated start here AD
   function index(Request $request)
    { 
        
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }
    //End here

    function register(Request $request){
        //dd($request);
         $validator=Validator::make($request->all(),[
            // 'email'=>'required|email|max:191|unique:users,email',
             'email'=>'required|email|max:191']);
          
            if($validator->fails()){

              return response()->json([
                 'status'=>203,
                  'validate_err'=>$validator->messages(),
              ]);      
            }
            else{
                 $user=User::where('email',$request->email)->first();
                //dd($user);
                
                if(!is_null($user))
                {
                    if($user->str_verify_status=='1'){
                          return response()->json(['status'=>203,
                                                   'message'=>'Your Email Id is already registered with State Central Library.',
                                                  ]);
                    }else{
                        
                        $otp=rand(100000,999999);
                        $user->int_otp=$otp;   
                        $user->str_user_type='user';

                        $mail_data=['fromEmail'=>$request->email,
                                    'fromName'=>$request->name,
                                    'body'=>strval($otp)];
     
                        $user->save();

                     Mail::send('email.emailverify',$mail_data, function ($message) use ($mail_data) {
                            $message->to($mail_data['fromEmail'])
                                    ->subject('One Time verification code.');
                            $message->from(env('MAIL_USERNAME'), 'Registration in State Central Library');
                        });
                   
                        return response()->json(['status'=>200,
                                                'user'=>$user,
                                                'message'=>'Email sent Successfully']);
                         }
                }else{
                
                    $user=new User();
                    $user->str_user_type ='user';        
                    $user->name=$request->input('name');
                    $user->email=$request->input('email');
                    $user->str_verify_status='0';
                    //$user->password=Hash::make($request->input('password'));
                    //$user->str_user_type=$request->input('user_type');
                    $otp=rand(100000,999999);
                    $user->int_otp=$otp;   
                
                    $mail_data=['fromEmail'=>$request->email,
                                'fromName'=>$request->name,
                                'body'=>strval($otp)];                     
                  
                    
                     Mail::send('email.emailverify',$mail_data, function ($message) use ($mail_data) {
                            $message->to($mail_data['fromEmail'])
                                    ->subject('One Time verification code.');
                            $message->from(env('MAIL_USERNAME'), 'Registration in State Central Library');
                        });

                        $user->save();
                        $id= $user->id;
                        return response()->json([
                                    'status'=>200,
                                    'user'=>$user,
                                    'id'=>$id,
                                    'message'=>'Email sent Successfully']);     
                    }
          }
    }//code start for User Login HP

    //code start for generate password after email verification HP
    function savePassword(Request $request){
        $validator=Validator::make($request->all(),[
            'password'=>'required|min:6',
        ]);
        //$user->password=Hash::make($request->input('password'));
         
        if($validator->fails()){
             return response()->json([
                'status'=>203,
                 'validate_err'=>$validator->messages(),
             ]);
     
           }else{
            $user= User::where('email', $request->email)->first();
            $user->str_verify_status='1';
            $user->password=Hash::make($request->input('password'));
            $user->name=$request->input('name');
            $user->update();
           return response()->json([
            'status'=>200,
            'user'=>$user,
            'message'=>'Registration  Successfully ',
        ]);

           }
    }
    function login(Request $request){        
       
       $user=User::where('email',$request->email)->first();
            //dd($user);
       if(!is_null($user)){
           if($user->str_user_type=='user'){
                if((!$user || Hash::check($request->email,$user->email)) && (!$user || !Hash::check($request->password,$user->password))){
                 return response()->json([
                    'status'=>203,
                    'emailmessage'=>"You don't have an account.Please Sign Up",
                    'message'=>'',
                ]); 
            }else if( !$user || Hash::check($request->email,$user->email)){
                return response()->json([
                    'status'=>203,
                    'emailmessage'=>'Email Invalid',
                    'message'=>'']); 
            }else if(!$user || !Hash::check($request->password,$user->password)){
                    return response()->json([
                        'status'=>404,
                        'message'=>'password invalid',
                        'emailmessage'=>'']);
            }else{
                    
                 //    $user_log=new UserLog();
                 // $user_log->intUserId=$user->id;
                 // $user_log->dtiLoginTime=$request->loginTime;
                 // $user_log->save();

                $check=Membership::where('intUserId',$user->id)->first();                
                if($check){
                    $membership_status='true';
                }else{
                    $membership_status='false';
                }
               return response()->json([
                        'status'=>200,
                        'user'=>$user,
                        'membership_status'=>$membership_status]);
                }
            }
            else if($user->str_user_type=='admin'){
                return response()->json([
                    'status'=>203,
                    'emailmessage'=>"You don't have an account.Please Sign Up",
                    'message'=>'',
                ]); 
            }
            else{
                return response()->json([
                        'status'=>404,
                        'user'=>"user not found"]);
            }
          }else{
                return response()->json([
                        'status'=>203,
                    'emailmessage'=>"You don't have an account.Please Sign Up",
                    'message'=>'',
                    ]);
          }
        }
      /* if($user==null){
                
            }else{
               echo "available"; exit;
            }
            
    if($user==null){
        
     }else{
        echo "available"; exit;
     }*/
    
   //End Code For User Login HP

   //New code start for Forgot Password HP
    function forgotPassword(Request $request){

        $user=User::where('email',$request->email)->first();

        if(!is_null($user)){

            if($user->str_verify_status=='1'){
               
                $otp=rand(100000,999999);
                $user->int_otp=$otp;

                $mail_data=['fromEmail'=>$request->email,
                             'body'=>strval($otp)];              
                  
                Mail::send('email.emailverify',$mail_data, function ($message) use ($mail_data) {
                            $message->to($mail_data['fromEmail'])
                                    ->subject('Forgot password verification code.');
                            $message->from(env('MAIL_USERNAME'), 'Forgot Password in State Central Library');
                });

                $user->update();
                return response()->json(['status'=>200,
                                     'user'=>$user,
                                     'message'=>'Email sent Successfully']);  
                          
            }else{
                return response()->json(['status'=>404,                              
                                         'message'=>'Email invalid']);
                          
            }
        }else{
                 return response()->json(['status'=>404,
                                          'message'=>"Email Id Invalid"]);
        }
    }
    //End New Code here for Forgot Password HP

    //start code for Update Password HP
    function updatepassword(Request $request){
        
        $validator=Validator::make($request->all(),[
            'updated_password'=>'required|min:6|max:12',
        ]);
        //$user->password=Hash::make($request->input('password'));
         
         if($validator->fails()){
             return response()->json([
                'status'=>203,
                 'validate_err'=>$validator->messages(),
             ]);
     
        }else{
        
            $user=User::where('email',$request->email)->first();
            $user->password=Hash::make($request->input('updated_password'));
            $user->update();
        
            return response()->json(['status'=>200,
                                     'message'=>'Password Update Successfully']);
        }
    }
    //end code for Update Password HP

    //Total User Count
    function NumberOfUsers(){
       //dd("hi");
        $user=User::where('str_verify_status','1')->get()->count();
        return response()->json(['status'=>200,
                                 'UserCount'=>$user]);
    }
    //End here
}