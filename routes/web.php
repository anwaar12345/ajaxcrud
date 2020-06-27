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

use App\mail\regismail;

Route::get('/emails', function () {
   
   Mail::to('fa15be0011@maju.edu.pk')->send( new regismail());
   
   
    return new regismail();
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('users','UsersAjaxController');

Route::get('auth/google','Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');