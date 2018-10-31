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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/home', 'PagesController@home')->name('home');
Route::get('/services','PagesController@services')->name('services');
Route::get('/blog','PagesController@blog')->name('blog');
Route::get('/contact','PagesController@contact')->name('contact');


Route::post('/newsletter', 'PagesController@newsletter')->name('newsletter');



Route::middleware('can:is-editor')->group(function() {

});

Route::middleware('can:is-admin')->group(function() {
  Route::get('/admin/home', 'HomeController@index')->name('adminhome');

});