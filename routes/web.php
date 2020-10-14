<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);


Route::group(['middleware' => ['auth']], function(){
    
    Route::get('download/{uuid}/download','FileController@download')->name('tes');

    Route::get('/logout', 'auth\LoginController@logout')->name('logout');
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin/home','HomeController@handleAdmin')->name('admin.home');
        Route::get('/admin/logout', 'auth\LoginController@logout')->name('admin.logout');
        Route::get('/admin/file/{id}/edit', 'FileController@edit');
        Route::post('/admin/file/{id}','FileController@update')->name('file.update');
        Route::get('/admin/log/{id}', 'FileController@showLog')->name('file.log');
        
       

        Route::resource('files', 'FileController');
        Route::get('/admin/user', 'UserController@index')->name('admin.user.index');
        Route::post('/admin/user/store', 'UserController@store')->name('admin.user.store');
        Route::get('/admin/user/{id}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::DELETE('/admin/user{id}', 'UserController@destroy')->name('admin.user.destroy');

        Route::post('/admin/changepassword','UserController@changePassword')->name('admin.password.change');
    });

    Route::group(['middleware' => ['user']], function(){
        
        Route::get('home', 'HomeController@handleUser')->name('home');
        Route::get('log/{id}', 'FileController@showLog')->name('file.log');
        Route::post('changepassword','UserController@changePassword')->name('user.password.change');
        // Route::get('download/{uuid}/download','FileController@download')->name('files.download');
    });
});




Route::get('/', function () {
    return view('auth.login');
});


// Route::resource('files', 'FileController');
// Route::get('files/{uuid}/download','FileController@download')->name('files.download');
