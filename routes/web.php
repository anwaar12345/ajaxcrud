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


Route::get('/phplaravel', function () {    
   return view('pagephp');
})->name('phplaravel');


Route::get('/nodejs', function () {    
    return view('pagenodejs');
 })->name('nodejs');
 
 Route::get('/reactnative', function () {    
   return view('pagereactnative');
})->name('reactnative');



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('users','UsersAjaxController');

Route::get('auth/google','Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');