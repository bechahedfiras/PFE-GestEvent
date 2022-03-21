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
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/home', 'HomeController@index')->name('home');



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
    Route::get('dashboard', 'UsersController@adminDashboard');

});




Route::get('/new', function () {
    
})->middleware('auth');



///fac routing mazal middlewere
Route::get('admin/faculte/create','FaculteController@create')->middleware('admin','auth');
Route::post('admin/faculte/store','FaculteController@store')->middleware('admin','auth');
Route::get('admin/faculte','FaculteController@index')->middleware('admin','auth');
Route::get('admin/faculte/{id}/edit','FaculteController@edit')->middleware('admin','auth');
Route::put('admin/faculte/{id}','FaculteController@update')->middleware('admin','auth');
Route::delete('admin/faculte/{id}/delete','FaculteController@destroy')->middleware('admin','auth');

// Optimization ^
// Route::get('faculte','FaculteController@index')->middleware('admin','auth');
// Route::get('faculte/create','FaculteController@create')->middleware('admin','auth');
// Route::post('faculte/store','FaculteController@store')->middleware('admin','auth');
// Route::get('faculte/{id}','FaculteController@edit')->middleware('admin','auth');
// Route::put('faculte/{id}','FaculteController@update')->middleware('admin','auth');
// Route::delete('faculte/{id}','FaculteController@delete')->middleware('admin','auth');