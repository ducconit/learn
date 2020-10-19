<?php

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
|rwpIoghe5l4n60kHcIp1X9buiC6XMoO5N5aVPV8oQZnwInneY0fDMbiu3ibq
*/
Route::namespace('\App\Http\Controllers\Api')->group(function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::middleware('auth.api')->group(function () {
        /*============= Tag ==========*/
        Route::get('/tag', 'TagController@index');


        /*========= Task ========*/
        Route::post('/task', 'TaskController@store');
        Route::get('/task', 'TaskController@index');
    });
});
