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

<<<<<<< HEAD
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('scene', 'SceneController@index');
=======
Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('scene', 'SceneController');
    // Route::get('scene', 'SceneController@index');
});
<<<<<<< HEAD

Route::post('register', 'UserController@store');
=======
>>>>>>> dec26b35100a57578d38a2f86d28a1758a1d286f
>>>>>>> 0882a45add6a4127e43863be9f21a49e6bce6a16
