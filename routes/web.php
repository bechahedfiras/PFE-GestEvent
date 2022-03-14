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




route::get('/','HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('admin/faculte/create','FaculteController@create');
Route::get('admin/faculte','FaculteController@index');
Route::get('admin/faculte/{id}/edit','FaculteController@edit');
Route::put('admin/faculte/{id}','FaculteController@update');
Route::delete('admin/faculte/{id}/delete','FaculteController@destroy');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
    Route::get('dashboard', 'UsersController@adminDashboard');

});




Route::get('/new', function () {
    
})->middleware('auth');