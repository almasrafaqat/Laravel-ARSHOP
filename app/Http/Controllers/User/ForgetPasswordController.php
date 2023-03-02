<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetRequest;
use App\Mail\ForgetMail;
use App\Models\User;
use DB;
use Mail;


class ForgetPasswordController extends Controller
{
   public function ForgetPassword(ForgetRequest $request){

    $email = $request->email;

        if(User::where('email', $email)->doesntExist()){
            return response([
                'message'       => "Invalid Email"
            ],401);
        }

        /*Generate Token**/
        $token = rand(10,1000000);

        try{
            DB::table('password_resets')->insert([
                'email'     => $email,
                'token'     => $token,

            ],200);
           
            Mail::to($email)->send(new ForgetMail($token));
            
            return response([
                'message'       => "Password Reset Link Has Been Sent ".$email,

            ],200);
        }
        catch(Exception $exception){
            return response([

                'message'   => $exception->getMessage(),
            ],400);
        }

   } //end method
}
