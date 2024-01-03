<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/forgetPassword', '\App\Http\Controllers\AuthController@forgetpassword');
Route::post('/checktoken', '\App\Http\Controllers\AuthController@token_check');
Route::post('/resetPassword', '\App\Http\Controllers\AuthController@reset_password');
Route::get('/verification/{id}', '\App\Http\Controllers\AuthController@verification');


            //// Voter Routes \\\\


Route::group(['prefix' => '/voter'], function() {
    Route::controller(App\Http\Controllers\Voter\AuthController::class)->group(function () {
        Route::post('register','register');
        Route::post('login','login');
    });
});




Route::group(['middleware' => ['auth:api']], function(){

    Route::middleware(['admin'])->group(function () {


    });
});   
