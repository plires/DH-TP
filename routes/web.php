<?php

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba', 'HomeController@index')->name('prueba');
Route::get('/faq', 'FaqController@index')->name('faq');

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::resource('products','ProductsController');
	Route::resource('categories','CategoriesController');
	Route::resource('document_types','DocumentTypesController');
});

Route::group(['prefix' => 'user', 'namespace' => 'User'], function(){
	Route::resource('products','ProductsController');
});