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

Route::get('/', 'PostController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'PostController@index']);

//authentication
// Route::resource('auth', 'Auth\AuthController');
// Route::resource('password', 'Auth\PasswordController');
Route::get('/logout', 'UserController@logout');
Route::group(['prefix' => 'auth'], function () {
  Auth::routes();
});

// check for logged in user
Route::middleware(['auth'])->group(function () {
  // show new post form
  Route::get('new-post', 'PostController@create');
  // save new post
  Route::post('new-post', 'PostController@store');
  // edit post form
  Route::get('edit/{slug}', 'PostController@edit');
  // update post
  Route::post('update', 'PostController@update');
  // delete post
  Route::get('delete/{id}', 'PostController@destroy');
  // display user's all posts
  Route::get('my-all-posts', 'UserController@user_posts_all');
  // display user's drafts
  Route::get('my-drafts', 'UserController@user_posts_draft');
  // add comment
  Route::post('comment/add', 'CommentController@store');
  // delete comment
  Route::post('comment/delete/{id}', 'CommentController@distroy');


  // HANDLING MEMBERS
  // All Members View
  Route::get('members', 'MembersController@index');
  // show new member form
  Route::get('new-member', 'MembersController@create');
  // save new member
  Route::post('newmember', 'MembersController@store');
  
  // view member info
  Route::get('member/{id}', 'MembersController@show');
  
  // update member
  Route::get('editmember/{id}', 'MembersController@edit');
  // update member
  Route::post('updatemember', 'MembersController@update');

  // search member
  Route::post('search-member', 'MembersController@searchMember');
  

  // delete member
  Route::get('deletemember/{id}', 'MembersController@destroy');

    // HANDLING FOLLOWUPS
  // All Followup Activities
  Route::get('followups', 'FollowupsController@index');
  // show new followup form
  Route::get('new-followup', 'FollowupsController@create');
  // save new member
  Route::post('newfollowup', 'FollowupsController@store');

  // add new followup for member
  Route::get('addfollowup/{memberid}/{name}', 'FollowupsController@addfollowup');


});

//users profile
Route::get('user/{id}', 'UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts', 'UserController@user_posts')->where('id', '[0-9]+');
// display single post
Route::get('post/{slug}', ['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');

// ARTISAN COMMANDS
Route::get('/clear-cache', function() {
  Artisan::call('cache:clear');
  return "Cache is cleared";
});

Route::get('migrate', function () {

  Artisan::call('migrate');

  dd("Migrated all tables");

});