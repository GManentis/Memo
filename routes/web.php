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

Route::get('/', function () {
    return view('home');
});

Route::get('/manage/{id}', 'ViewMemo@Page');


Route::get('/newEntry', function () {
    return view('newentry');
});

Route::post('/insert','AjaxController@insert');

Route::post('/delete', 'Delete@delete');

