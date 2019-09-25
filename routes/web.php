<?php

Route::get('/', function () {
return view('welcome');

});
/*
Route::get('/hello', function () {
//return view('welcome');
return '<h1>Hello World</h1>';
});
Route::get('/users/{id}', function ($id) {
return 'This is user' .$id; 

});
*/
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
//Route::resource('/posts/create', 'PostsController');
Route::get('readPosts', 'PostsController@readPosts');
Route::get('readPosts/create', 'PostsController@create');
Route::get('showPosts/{id}', 'PostsController@showPosts');
Route::get('readPosts/{id}/edit', 'PostsController@edit');
//Route::get('readPosts/{id}', 'PostsController@update');

//Route::get('/createPosts', 'PostsController@createPosts');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
