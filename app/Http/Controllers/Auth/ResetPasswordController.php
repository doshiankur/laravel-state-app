<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token,$email) {

       return view('auth.passwords.reset', ['token' => $token,'email'=>$email]);
    }

    public function updatePassword(Request $request)
    {//dd($request);
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

          //dd($updatePassword);
        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/webpanel/login')->with('message', 'Your password has been changed!');

    }
}