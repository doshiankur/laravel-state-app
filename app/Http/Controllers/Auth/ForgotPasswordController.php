<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;
use Illuminate\Validation\Rule;


class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
       // dd("hi");
       return view('auth.passwords.email');
    }

    public function postEmail(Request $request)
    { //dd("hi");
        $request->validate([
            //'email' => 'required|email|exists:users',
            'email' => ['required',
                        Rule::exists('users')->where(function ($query) {
                                return $query->where('str_user_type','admin');
                        })
                       ],['email.required'=>'You do not have access to login']
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.passwords.verify',['token' => $token,'email' => $request->email], function($message) use ($request) {
                  $message->from(env('MAIL_USERNAME'), 'Thank you for showing your interest in State Central Library Department');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });
        
        return back()->with('status', 'We have e-mailed your password reset link!');
    }
}