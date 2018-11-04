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
  Route::post('/admin/edit/homepage/discovertitle', 'HomeController@discoverTitle');
  Route::post('/admin/edit/homepage/discoverleft', 'HomeController@discoverLeft');
  Route::post('/admin/edit/homepage/discoverright', 'HomeController@discoverRight');
  Route::post('/admin/edit/homepage/browseblog', 'HomeController@browseBlog');
  Route::post('/admin/edit/homepage/browseservices', 'HomeController@browseServices');
  Route::post('/admin/edit/homepage/browsestandout', 'HomeController@browseStandout');
  Route::post('/admin/edit/homepage/video', 'HomeController@video');
  Route::post('/admin/edit/homepage/teamtitle', 'HomeController@teamTitle');
  Route::post('/admin/edit/homepage/standouttitle', 'HomeController@standoutTitle');
  Route::post('/admin/edit/homepage/standouttext', 'HomeController@standoutText');
  
  Route::post('/admin/edit/testimonialtitle', 'TestimonialController@title');
  Route::post('/admin/edit/testimonial/{id}', 'TestimonialController@update');
  Route::post('/admin/edit/testimonial/{id}/delete', 'TestimonialController@delete');
  
  Route::post('/admin/edit/servicestitle', 'ServiceController@title');
  Route::post('/admin/edit/service/{id}', 'ServiceController@update');
  Route::post('/admin/edit/service/{id}/delete', 'ServiceController@delete');
  
  Route::post('/admin/edit/user/{id}', 'UserController@update');
  Route::post('/admin/edit/user/{id}/delete', 'UserController@delete');

  Route::post('/admin/edit/contact/title', 'ContactController@title');
  Route::post('/admin/edit/contact/text', 'ContactController@text');
  Route::post('/admin/edit/contact/info', 'ContactController@info');
  Route::post('/admin/edit/contact/sendbutton', 'ContactController@sendButton');

  Route::post('/admin/edit/footer', 'HomeController@footer');

});

