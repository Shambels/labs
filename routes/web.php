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
Route::get('/blogpost/{id}','PagesController@blogpost')->name('blogpost');
Route::get('/contact','PagesController@contact')->name('contact');


Route::post('/newsletter', 'PagesController@newsletter')->name('newsletter');


Route::middleware('can:is-editor')->group(function() {
  // Route::get('', '')->name('editorhome');
});



// EDITS
Route::middleware('can:is-admin')->group(function() {

  Route::get('/admin/home', 'AdminpageController@index')->name('adminhome');

  // HOME PAGE 
  Route::get('/admin/edit/homepage', 'AdminpageController@home')->name('edithome');
  Route::post('/admin/edit/homepage/carouseltext', 'HomeController@carouselText');
  Route::post('/admin/edit/homepage/services/{id}', 'HomeController@services');
  Route::post('/admin/edit/homepage/discovertitle', 'HomeController@discovertitle');
  Route::post('/admin/edit/homepage/discoverleft', 'HomeController@discoverleft');
  Route::post('/admin/edit/homepage/discoverright', 'HomeController@discoverright');
  Route::post('/admin/edit/homepage/browseblog', 'HomeController@browseblog');
  Route::post('/admin/edit/homepage/video', 'HomeController@video');
  Route::post('/admin/edit/homepage/testimonial', 'HomeController@testimonial');
  
});

