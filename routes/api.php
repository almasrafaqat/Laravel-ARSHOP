<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ForgetPasswordController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserLocationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*User Login Route*/
Route::post('/login', [AuthController::class, 'Login']);
/*User Register Route*/
Route::post('/register',[AuthController::class, 'Register']);
/*User Forget Password Route*/
Route::post('/forget/password',[ForgetPasswordController::class, 'ForgetPassword']);
/*User Reset Password Route*/
Route::post('/reset/password', [ResetPasswordController::class, 'ResetPassword']);
/**User Session Route **/
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');

/**GET Visitor*/
Route::get('/getvisitor/{user_id}/{username}/{page}', [UserLocationController::class, 'GetVisitorDetails']);


/** Category Controller **/
Route::get('/getcategories', [CategoryController::class, 'get_categories']);

/** Home Slider **/
Route::get('/getsliders', [SliderController::class, 'GetSlider']);
