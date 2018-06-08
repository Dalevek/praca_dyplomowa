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


/*
Route::get('/hello', function () {
    return '<h1>Hello world</h1>';
});



Route::get('/users{id} ', function ($id) {
    return 'This is user '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/cam', 'PagesController@camera');
Route::get('/pdf', 'PagesController@pdfViewer');

Route::get('/modbus/index', 'ModbusController@logs');
Route::get('/modbus/trends', 'ModbusController@trends');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
