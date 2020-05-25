<?php

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes(['register' => true]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function() {
    Route::resource('users', 'UserController');
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::route('home');
})->name('logout');