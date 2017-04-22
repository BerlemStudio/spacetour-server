<?php

use Illuminate\Http\Request;

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
$routeResource = [
    'except' => [
        'create',
        'edit'
    ]
];
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['prefix' => 'me'], function () {
        Route::get('user_scene_list' , 'UserController@user_scene_list');
        Route::get('user_scene_list_unlock', 'UserController@user_scene_list_unlocked');
        Route::post('unlock', 'UserController@unlockScene');
    });
    Route::resource('scene', 'SceneController');
    Route::resource('story', 'StoryController');
    Route::get('user', 'UserController@index');
});
Route::post('register', 'UserController@store');
