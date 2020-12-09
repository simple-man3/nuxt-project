<?php

use App\Http\Controllers\Api\Auth\LoginController;
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

Route::group(['middleware' => 'auth:api','client'], function() {
    Route::get('/auth/user', [LoginController::class,'getAuthUser']);

//    Route::get('/get-access',[LoginController::class,'userAccess'])->middleware('can:something');
    Route::get('/get-access',[LoginController::class,'userAccess']);

});

Route::get('/ty',[LoginController::class,'ty']);
