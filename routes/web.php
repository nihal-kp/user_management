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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {  return view('login');   });
Route::post('/login','App\Http\Controllers\UserController@login');
Route::get('/admin','App\Http\Controllers\UserController@admin');
Route::get('/add', function () {  return view('add');   });
Route::post('/add','App\Http\Controllers\UserController@add');
Route::get('/view/{id}','App\Http\Controllers\UserController@view');
Route::get('/delete/{id}','App\Http\Controllers\UserController@delete');
Route::get('/search','App\Http\Controllers\UserController@search');
Route::get('/signup', function () {  return view('signup');   });
Route::post('/signup','App\Http\Controllers\UserController@signup');
Route::get('/profile','App\Http\Controllers\UserController@profile');
Route::get('/edit','App\Http\Controllers\UserController@edit');
Route::put('/update', 'App\Http\Controllers\UserController@update');
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});