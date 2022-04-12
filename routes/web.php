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

Route::group(['middleware' => ['auth', 'verifyemail']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/documents', 'HomeController@documents')->name('documents');
    Route::get('/reclamation', 'HomeController@reclamation')->name('reclamation');
    Route::get('/about', 'HomeController@about')->name('about');
});


/**
 * Email verification routing
 */
Route::get('/verifyEmail', 'Admin\UsersController@showVerifyEmail');
Route::get('/newCode', 'Admin\UsersController@sendNewCode');
Route::post('/verifyEmail', 'Admin\UsersController@validEmailCode');

/**
 * Events & Subevents  routing
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin','auth')->group(function(){
    Route::resource('events','EventController');
    Route::resource('subevents','SubeventController');
    Route::get('dashboard', 'UsersController@adminDashboard');
});
Route::get('/events','Admin\EventController@geteventind');
Route::get('/subevents','Admin\SubeventController@getsubeventind');
Route::get('getsubevents/{id}','Admin\EventController@getsubevent');
/**
 * contact routing
 */
// Route::resource('contact','ContactController')->middleware('admin','auth');
//solution for now
Route::post('contact','ContactController@store');
Route::get('contactus','ContactController@index')->middleware('admin','auth');
Route::delete('contactus/{id}','ContactController@destroy')->middleware('admin','auth');
route::get('/contact','ContactController@index2');

/**

 * sponsorimg  routing
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin','auth')->group(function(){
    Route::resource('sponsorsimg','SponsorimgController');
});

/**
 * Gallery images routing
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin','auth')->group(function(){
   Route::resource('gallery','GalleryController');
   Route::get('dashboard', 'UsersController@adminDashboard');
});


/**
 * My profile roots
 * Route::namespace('user')->prefix('users')->name('user.')->middleware('user','auth')->group(function(){
 * });
 */

    route::get('users/profile','User\UsersController@edit')->name('users.edit-profile')->middleware('auth');
    route::put('users/profile', 'User\UsersController@update')->name('users.update-profile')->middleware('auth');
