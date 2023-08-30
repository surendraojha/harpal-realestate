<?php

use App\Http\Controllers\Api\GetController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PropertyController;
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



    // get apis


    Route::get('get-province',[GetController::class,'getProvince']);
    Route::get('get-district',[GetController::class,'getDistrict']);
    Route::get('get-municipality',[GetController::class,'getMunicipality']);
    Route::get('get-woda',[GetController::class,'getWoda']);
    Route::get('get-purpose',[GetController::class,'getPurpose']);
    Route::get('get-category',[GetController::class,'getCategory']);


    Route::get('logout',[LoginController::class,'logout']);




    Route::post('contact-us',[PageController::class,'contactUs']);
    Route::get('about-us',[PageController::class,'aboutUs']);
    Route::get('faq',[PageController::class,'faq']);
    Route::get('page/{slug}',[PageController::class,'page']);
    Route::get('blogs',[PageController::class,'blogs']);


    Route::get('property',[PropertyController::class,'index']);
    Route::post('property-store',[PropertyController::class,'store']);
    Route::put('property-update/{id}',[PropertyController::class,'update']);
    Route::delete('property-destroy/{id}',[PropertyController::class,'destroy']);




});


