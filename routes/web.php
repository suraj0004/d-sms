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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/contacts', 'ContactController@index')->name('contacts');
Route::post('/addContact','ContactController@addContact')->name('addContact');
Route::post('/editContact','ContactController@editContact')->name('editContact');
Route::post('/deleteContact','ContactController@deleteContact')->name('deleteContact');
