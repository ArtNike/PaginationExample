<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user()){
        return view('home');
    }
    else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {

    Route::prefix('articles')->group(function () {

        Route::get('/', 'ArticleController@index');

        Route::post('add', 'ArticleController@add');

        Route::post('publish', 'ArticleController@publish');

        Route::post('undo', 'ArticleController@undo');

        Route::post('delete', 'ArticleController@undo');

    });

});

Route::prefix('api')->group(function (){

    Route::prefix('articles')->group(function (){

        Route::get('{article}', 'API\ArticleController@getUnsorted');

    });

    Route::get('timestamp', 'API\TimeController@get');
});






