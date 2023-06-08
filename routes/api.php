<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\AuthController;


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
Auth::routes(['verify' => true]);

Route::post('register', 'App\Http\Controllers\API\AuthController@register');
Route::post('login', 'App\Http\Controllers\API\AuthController@login');

Route::group(['middleware' => 'auth:api','verified'], function(){
    //recipe
    Route::get('recipe', 'App\Http\Controllers\RecipeController@index');
    Route::get('/recipe/search/{name}', 'App\Http\Controllers\RecipeController@search');

    //category
    Route::get('category', 'App\Http\Controllers\CategoryController@index');
    Route::get('/recipe/getByCategory/{category}', 'App\Http\Controllers\RecipeController@getByCategory');

    //user
    Route::put('user/{id}', 'App\Http\Controllers\UserController@update');
    Route::post('/dataUser/{id}', 'App\Http\Controllers\dataUserController@store');
    Route::get('dataUser', 'App\Http\Controllers\dataUserController@index');

    //foodHistory
    Route::post('foodHistory', 'App\Http\Controllers\foodHistoryController@store');
    Route::get('foodHistory/{date}/{user_id}', 'App\Http\Controllers\foodHistoryController@getByDate');
    Route::get('/foodHistoryGroup/{date}/{user_id}', 'App\Http\Controllers\foodHistoryController@getCaloriesByDateAndTime');

    Route::post('logout', 'App\Http\Controllers\API\AuthController@logout');
});
