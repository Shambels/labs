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
Route::get('/results/{search}','PagesController@results');
Route::post('/search', 'PagesController@search')->name('search');
Route::post('/newsletter', 'ContactController@subscribe')->name('newsletter');
Route::post('/blogpost/{id}/comments/add', 'CommentController@store');

// Route::middleware('can:is-author')->group(function()){
// }

Route::middleware('can:is-editor')->group(function() {
  // Route::get('', '')->name('editorhome');
});



// EDITS
Route::middleware('can:is-admin')->group(function() {

  Route::get('/admin/home', 'AdminpageController@index')->name('adminhome');

  // PAGES
  Route::get('/admin/edit/homepage', 'AdminpageController@home')->name('edithome');
  Route::get('/admin/edit/servicespage', 'AdminpageController@services')->name('editservices');
  Route::get('/admin/edit/blogpage', 'AdminpageController@blog')->name('editblog');
  Route::get('/admin/edit/blogpost/{id}','AdminpageController@blogpost')->name('editblogpost');
  Route::get('/admin/edit/contactpage', 'AdminpageController@contact')->name('editcontact');
    // PAGES NAMES
    Route::post('admin/edit/pagename/home', 'PagenameController@home');
    Route::post('admin/edit/pagename/services', 'PagenameController@services');
    Route::post('admin/edit/pagename/blog', 'PagenameController@blog');
    Route::post('admin/edit/pagename/contact', 'PagenameController@contact');
  

  // HOME PAGE
  Route::post('/admin/edit/homepage/carouseltext', 'HomeController@carouselText');
  Route::post('/admin/edit/homepage/carouselimage/{id}', 'HomeController@carouselImage');
  Route::post('/admin/edit/homepage/carouselimage/{id}/delete', 'HomeController@deleteCarouselImage');
  Route::post('/admin/edit/homepage/addcarouselimage', 'HomeController@addCarouselImage');

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

  // LOGO
  Route::post('admin/edit/logo', 'HomeController@logo');

  // TESTIMONIALS
  Route::post('/admin/edit/testimonialtitle', 'TestimonialController@title');
  Route::post('/admin/edit/testimonial/{id}', 'TestimonialController@update');
  Route::post('/admin/edit/testimonial/{id}/delete', 'TestimonialController@delete');
  
  // SERVICES
  Route::post('/admin/edit/servicespage/title', 'ServiceController@title');
  Route::post('/admin/edit/servicespage/browseservices2', 'ServiceController@browseServices2');
  Route::post('/admin/edit/servicespage/title2', 'ServiceController@title2');
  Route::post('admin/edit/servicespage/phone', 'ServiceController@phone');
  
  Route::post('/admin/edit/service/{id}', 'ServiceController@update');
  Route::post('/admin/edit/service/{id}/delete', 'ServiceController@delete');

  // PROJECTS
  Route::post('admin/edit/project/{id}', 'ProjectController@update');
  Route::post('admin/edit/project/{id}/delete', 'ProjectController@delete');

  // BLOG 
  Route::post('admin/edit/article/{id}', 'ArticleController@update');
  Route::post('admin/edit/article/{id}/delete', 'ArticleController@delete');
    // Sidebar
      // Titles
      Route::post('/admin/edit/blogpage/titles/categories', 'BlogController@categoriesTitle');
      Route::post('/admin/edit/blogpage/titles/instagram', 'BlogController@instagramTitle');
      Route::post('/admin/edit/blogpage/titles/tags', 'BlogController@tagsTitle');
      Route::post('/admin/edit/blogpage/titles/quote', 'BlogController@quoteTitle');
      Route::post('/admin/edit/blogpage/titles/ad', 'BlogController@adTitle');
      // Content
      Route::post('/admin/edit/category/store', 'CategoryController@store');
      Route::post('/admin/edit/category/{id}', 'CategoryController@update');
      Route::post('/admin/edit/category/{id}/delete', 'CategoryController@delete');

      Route::post('/admin/edit/instagram/store', 'InstagramController@store');
      Route::post('/admin/edit/instagram/{id}', 'InstagramController@update');
      Route::post('/admin/edit/instagram/{id}/delete', 'InstagramController@delete');

      Route::post('/admin/edit/tag/store', 'TagController@store');
      Route::post('/admin/edit/tag/{id}', 'TagController@update');
      Route::post('/admin/edit/tag/{id}/delete', 'TagController@delete');

      Route::post('/admin/edit/quote/{id}', 'BlogController@quote');
      Route::post('/admin/edit/quote/{id}/delete', 'BlogController@quoteDelete');

      Route::post('/admin/edit/ad', 'BlogController@ad');

      // Search
      Route::get('/admin/results/{search}','AdminpageController@results');
      Route::post('/admin/search', 'AdminpageController@search')->name('search');
  // NEWSLETTER
  Route::post('//admin/edit/newsletter/title', 'ContactController@newsletterTitle');
  Route::post('/admin/edit/newsletter/button', 'ContactController@newsletterButton');
  
  // CONTACT 
  Route::post('/admin/edit/contact/title', 'ContactController@title');
  Route::post('/admin/edit/contact/text', 'ContactController@text');
  Route::post('/admin/edit/contact/info', 'ContactController@info');
  Route::post('/admin/edit/contact/sendbutton', 'ContactController@sendButton');

  // USERS
  Route::get('/admin/edit/user/{id}/edit', 'UserController@edit')->name('edituser');
  Route::post('/admin/edit/user/{id}', 'UserController@update');
  Route::post('/admin/edit/user/{id}/delete', 'UserController@delete');
  Route::post('/admin/edit/adduser', 'UserController@store');
        // User's Articles
        Route::get('/admin/list/users/{id}/articles', 'ListController@userArticles');
        // User's Comments
        Route::get('/admin/list/users/{id}/comments', 'ListController@userComments');

  // FOOTER
  Route::post('/admin/edit/footer', 'HomeController@footer');

  // LISTS
  Route::get('admin/list/users', 'ListController@users')->name('userslist');
  Route::get('admin/list/services', 'ListController@services')->name('serviceslist');
  Route::get('admin/list/projects', 'ListController@projects')->name('projectslist');
  Route::get('admin/list/articles', 'ListController@articles')->name('articleslist');
  Route::get('admin/list/icons', 'ListController@icons')->name('iconslist');
      
      // TRASH CAN
      Route::get('admin/trash/users', 'TrashController@users')->name('trasheduserslist');
      Route::get('admin/trash/services', 'TrashController@services')->name('trashedserviceslist');
      Route::get('admin/trash/projects', 'TrashController@projects')->name('trashedprojectslist');
      Route::get('admin/trash/articles', 'TrashController@articles')->name('trashedarticleslist');
      Route::get('admin/trash/icons', 'TrashController@icons')->name('trashediconslist');
     
});

