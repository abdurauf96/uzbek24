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

//route for clear cache
Route::get('/cache', function () {
    \Artisan::call('config:cache');
    return back();
});

//routes for language
Route::get('lang/{locale}', function ($locale){
    session(['locale'=>$locale]);
    return redirect()->back();
});

Route::get('/', 'PageController@index');
Route::get('/category/{slug}', 'PageController@posts');
Route::get('/post/{id}', 'PageController@viewPost');
Route::get('/page/{slug}', 'PageController@page');
Route::get('/contact', 'PageController@contact');
Route::post('/contact', 'PageController@storeMessage');
Route::get('/search', 'PageController@search');
//Route::get('/posts/{id}/{tag}', 'PageController@postsByTag');

//ajax
Route::get('/load-latest-posts', 'PageController@loadLatestPosts');
Route::get('/load-sidebar-posts', 'PageController@loadSidebarPosts');
Route::get('/load-anons', 'PageController@loadAnons');
Route::get('/load-top-posts', 'PageController@loadTopPosts');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
