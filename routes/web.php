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

Route::get('/', 'HomeController@index');
Route::post('/store-simple-contact', 'HomeController@storeSimpleContact');
Route::get('/chuyen-muc/{category_slug}', 'PostController@category');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
