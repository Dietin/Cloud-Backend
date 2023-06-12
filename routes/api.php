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


//21 dietin model routes
Route::post('register', 'App\Http\Controllers\API\AuthController@register');
Route::post('login', 'App\Http\Controllers\API\AuthController@login');

Route::group(['middleware' => 'auth:api','verified'], function(){
    //recipe
    Route::get('recipe', 'App\Http\Controllers\RecipeController@index');
    Route::get('/recipe/search', 'App\Http\Controllers\RecipeController@search');
    Route::get('/recipe/{id}', 'App\Http\Controllers\RecipeController@getByid');

    //category
    Route::get('category', 'App\Http\Controllers\CategoryController@index');
    Route::get('/recipe/getByCategory/{category}', 'App\Http\Controllers\RecipeController@getByCategory');

    //user
    Route::put('user', 'App\Http\Controllers\UserController@update');
    Route::post('/dataUser', 'App\Http\Controllers\dataUserController@store');
    Route::get('dataUser', 'App\Http\Controllers\dataUserController@index');

    //foodHistory
    Route::post('foodHistory', 'App\Http\Controllers\foodHistoryController@store');
    Route::get('foodHistory/{date}', 'App\Http\Controllers\foodHistoryController@getByDate');
    Route::get('/foodHistoryGroup/{date}', 'App\Http\Controllers\foodHistoryController@getCaloriesByDateAndTime');
    Route::delete('foodHistory/{id}', 'App\Http\Controllers\foodHistoryController@destroy');
    Route::delete('deleteAllFoodHistory', 'App\Http\Controllers\foodHistoryController@destroyAll');

    //searchHistory
    Route::get('searchHistory', 'App\Http\Controllers\searchHistoryController@index');
    Route::post('searchHistory', 'App\Http\Controllers\searchHistoryController@store');
    Route::delete('deleteAllSearchHistory', 'App\Http\Controllers\searchHistoryController@destroyAll');

    //favorite
    Route::get('favorite', 'App\Http\Controllers\favoriteController@index');
    Route::get('checkFavorite/{id}', 'App\Http\Controllers\favoriteController@checkIsFavorit');
    Route::post('favorite', 'App\Http\Controllers\favoriteController@store');
    Route::delete('favorite/{id}', 'App\Http\Controllers\favoriteController@destroy');
    Route::delete('deleteAllFavorite', 'App\Http\Controllers\favoriteController@destroyAll');

    Route::post('logout', 'App\Http\Controllers\API\AuthController@logout');
});
