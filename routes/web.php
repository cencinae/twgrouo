<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});


Route::resource('publications', 'PublicationsController');
Route::post('publications/update', 'PublicationsController@update');


Route::get('comments/{publication}', 'CommentsController@show');
Route::post('comments', 'CommentsController@store');