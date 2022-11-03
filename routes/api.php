<?php

use App\Http\Controllers\Api\V1\CategoyController;
use App\Http\Controllers\Api\V1\CleaningController;
use App\Http\Controllers\Api\V1\DebtsController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\password\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1' ,'middleware' => 'lang'], function () {

    //guest routes


    Route::post('/register',[UserController::class,'Register']);
    Route::post('/verify',[UserController::class,'verify'])->middleware('auth:sanctum');
    Route::post('/logout',[UserController::class,'logout'])->middleware('auth:sanctum');
    Route::post('/login',[UserController::class,'login']);
    //password reset

    Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']);

    Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

    Route::post('/Regenerate',[UserController::class,'Regenerate'])->middleware('auth:sanctum');
    Route::get('/rules',[UserController::class,'rules']);
    Route::put('updaterules',[UserController::class , 'updaterules']);

    // Categories start
    Route::get('/categories/index',[CategoyController::class,'index']);
    Route::get('/categories/show/{id}',[CategoyController::class,'show']);
    Route::post('/categories/store',[CategoyController::class,'store']);

    // Categories end

    // Cleaning start
    Route::get('/cleaning/index/{cat_id}',[CleaningController::class,'index']);
    Route::get('/cleaning/show/{id}',[CleaningController::class,'show']);
    Route::post('/cleaning/store',[CleaningController::class,'store']);


    // Cleaning end





    Route::get('/home',[HomeController::class,'index']);

    Route::put('/home/update',[HomeController::class,'store'])->middleware('auth:sanctum');



    //protected routes


});
