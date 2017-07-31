<?php

use App\Category;


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
view()->share('categoriesMenu', Category::all());

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/prueba', 'HomeController@index')->name('prueba');
Route::get('/faq', 'FaqController@index')->name('faq');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('document_types', 'DocumentTypesController');
});

// Asi es para que deba estar logueado antes de ingresar
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth'] ], function () {
    Route::resource('products', 'ProductsController');
});
