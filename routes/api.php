<?php

use Illuminate\Http\Request;
use App\Http\Controllers;

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

//Route::apiResources([
//   '/timer_status' => 'TimerStatusController'
//]);

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'ApiAuth\AuthController@login');
    Route::post('register', 'ApiAuth\AuthController@register');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'ApiAuth\AuthController@logout');
        Route::get('user', 'ApiAuth\AuthController@user');
        Route::apiResources(['/timer_status' => 'TimerStatus\TimerStatusController']);
        Route::apiResources(['/tasks' => 'Task\TaskController']);
        Route::get('/total_spent', 'Task\TaskController@timeSpent');
    });
});

//Route::post('oauth/token', 'Laravel\Passport\Http\Controllers\AccessTokenController@issueToken ');