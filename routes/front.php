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
Route::group(['namespace' => 'Front',/* 'middleware' => 'auth:admin'*/], function () {
Route::prefix('')->group(function (){
    Route::get('contact','ContactsController@contact')->name('front.contact');
    Route::post('sendContact','ContactsController@sendContact')->name('front.sendContact');

});
});
