<?php

use App\Http\Controllers\Agent\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth','is-admin'],'prefix'=>'iv-agent'],function(){

    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('agent.dashboard');

});
