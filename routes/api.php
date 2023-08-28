<?php

use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
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


Route::group(['prefix'=>'v1'],function(){

    Route::get('test-api',function(){
        return response()->json(['message'=>'test successs']);
    });

    Route::post('login',[LoginController::class,'login']);


    Route::get('refresh-token',[ProfileController::class,'refresh']);
    // Route::post('account-setup',[ProfileController::class,'accountSetup']);
    Route::get('logout',[LoginController::class,'logout']);

    Route::get('about-us',[PageController::class,'aboutUs']);

    Route::get('faq',[PageController::class,'faq']);

    Route::get('page/{slug}',[PageController::class,'page']);


    Route::get('blogs',[PageController::class,'blogs']);



});


