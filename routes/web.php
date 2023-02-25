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

Route::get('', 'IndexController@index')->name('index');
Route::post('', 'IndexController@send')->name('index.send');
Route::get('about', 'AboutController@index')->name('about');
Route::get('about/{about}', 'AboutController@single')->name('about.single');
Route::get('service', 'ServiceController@index')->name('service');
Route::get('portfolio', 'PortfolioController@index')->name('portfolio');
Route::get('price', 'PriceController@index')->name('price');
Route::get('skill', 'SkillController@index')->name('skill');
Route::get('team', 'TeamController@index')->name('team');
Route::get('review', 'ReviewController@index')->name('review');
Route::get('client', 'ClientController@index')->name('client');
Route::get('contact', 'ContactController@index')->name('contact');



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
	Route::get('', 'IndexController@index')->name('admin.index');
	Route::resource('about', 'AboutController');
	Route::resource('service', 'ServiceController');
	Route::resource('portfolio', 'PortfolioController');
	Route::resource('price', 'PriceController');
	Route::resource('skill', 'SkillController');
	Route::resource('team', 'TeamController');
	Route::resource('review', 'ReviewController');
	Route::resource('role', 'RoleController');
});

Auth::routes();