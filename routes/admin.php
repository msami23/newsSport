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

define('PAGINATION_COUNT', 10);

Route::group(['namespace' => 'Admin',/* 'middleware' => 'auth:admin'*/], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    /* *******************************Begin languages Route ********************************** */
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', 'LanguagesController@index')->name('admin.languages');
        Route::get('create', 'LanguagesController@create')->name('admin.languages.create');
        Route::post('store', 'LanguagesController@store')->name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@destroy') -> name('admin.languages.delete');

    });
    /* *******************************Begin main categories Route ********************************** */
    Route::group(['prefix' => 'main_categories'], function () {
        Route::get('/', 'MainCategoriesController@index')->name('admin.main_categories');
        Route::get('create', 'MainCategoriesController@create')->name('admin.main_categories.create');
        Route::post('store', 'MainCategoriesController@store')->name('admin.main_categories.store');

        Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.main_categories.edit');
        Route::post('update/{id}','MainCategoriesController@update') -> name('admin.main_categories.update');

        Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.main_categories.delete');

    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});

Route::group(['namespace' => 'Front',/* 'middleware' => 'auth:admin'*/], function () {
    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', 'CategoriesController@index')->name('front.categories');
        Route::get('create', 'CategoriesController@create')->name('front.categories.create');
        Route::post('store', 'CategoriesController@store')->name('front.categories.store');
        Route::get('edit/{id}', 'CategoriesController@edit')->name('front.categories.edit');
        Route::post('update/{id}', 'CategoriesController@update')->name('front.categories.update');
        Route::get('delete/{id}', 'CategoriesController@delete')->name('front.categories.delete');
    });

    Route::group(['prefix' => 'news'], function () {

        Route::get('/', 'NewsController@index')->name('front.news');
        Route::get('create', 'NewsController@create')->name('front.news.create');
        Route::post('store', 'NewsController@store')->name('front.news.store');
        Route::get('edit/{id}', 'NewsController@edit')->name('front.news.edit');
        Route::post('update/{id}', 'NewsController@update')->name('front.news.update');
        Route::get('delete/{id}', 'NewsController@delete')->name('front.news.delete');
    });

});
