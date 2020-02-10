<?php

Route::post('artigos', 'ArtigoController@index')->name('artigos.index')->middleware('auth');
Route::post('artigos/delete', 'ArtigoController@deletar')->name('artigos.delete');
Route::get('user', function(){
    return view('auth.login');
});
Route::get('/', function(){
    return view('index');
})->middleware('auth');
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
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
