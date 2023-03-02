<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetRequest;
use App\Models\User;
use Hash;
use DB;

class ResetPasswordController extends Controller
{
    public function ResetPassword(ResetRequest $request){

        $token = $request->token;
        $email = $request->email;
        $password = Hash::make($request->password);

        $emailcheck = DB::table('password_resets')->where('email',$email)->first();
        $tokencheck = DB::table('password_resets')->where('token', $token)->first();

        if(!$emailcheck){
            return response([
                'message'   => "Invalid Email"
            ],401);
        }

        if(!$tokencheck){
            return response([
                'message'       => 'Invalid Token',
            ],401);
        }

        DB::table('users')->where('email', $email)->update(['password' =>  $password]);
        DB::table('password_resets')->where('email', $email)->delete();

        return response([
            'message'   => 'Password Changed Successfully'

        ],200);



    } //end method
}
