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


Route::group(['prefix' => '/admin'], function() {
    Route::controller(App\Http\Controllers\Admin\AuthController::class)->group(function () {
        Route::post('login','login');
    });
});

            //// Voter Routes \\\\


Route::group(['prefix' => '/voter'], function() {
    Route::controller(App\Http\Controllers\Voter\AuthController::class)->group(function () {
        Route::post('register','register');
        Route::post('login','login');
    });
});


Route::group(['prefix' => '/home'], function() {
    Route::controller(App\Http\Controllers\Voter\HomeController::class)->group(function () {
        Route::get('','index');
    });
});






Route::group(['middleware' => ['auth:api']], function(){


    Route::group(['prefix' => '/voter'], function() {
    Route::controller(App\Http\Controllers\Voter\VoteController::class)->group(function () {
        Route::post('vote','create');
    });
    });

    ///////////////// Admin Routes \\\\\\\\\\\\\\\\\\\


            

    Route::middleware(['admin'])->group(function () {



                                        // Dashboard

        Route::group(['prefix' => '/admin/dashboard'], function() {
            Route::controller(App\Http\Controllers\Admin\DashboardController::class)->group(function () {
                Route::get('','index');
            });
        });


                                // Vote

        Route::group(['prefix' => '/admin/vote'], function() {
            Route::controller(App\Http\Controllers\Admin\VoteController::class)->group(function () {
                Route::get('show','index');
            });
        });

                        // Party

        Route::group(['prefix' => '/admin/party'], function() {
            Route::controller(App\Http\Controllers\Admin\PartyController::class)->group(function () {
                Route::get('show','index');
                Route::post('create','create');
                Route::post('update','update');
                Route::get('delete/{id}','delete');
                Route::get('status/{id}','status');
            });
        });



                                // Voters

        Route::group(['prefix' => '/admin/voter'], function() {
            Route::controller(App\Http\Controllers\Admin\VoterController::class)->group(function () {
                Route::get('show','index');
                Route::get('delete/{id}','delete');
                Route::get('status/{id}','status');
            });
        });



                                // Banner

        Route::group(['prefix' => '/admin/banner'], function() {
            Route::controller(App\Http\Controllers\Admin\BannerController::class)->group(function () {
                Route::get('show','index');
                Route::post('create','create');
                Route::get('delete/{id}','delete');
            });
        });

    });
});   
