<?php

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes(['register' => true]);

Route::group(['middleware' => 'auth'], function() {
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('home', 'HomeController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function() {
    Route::resource('users', 'UserController');
});

Route::namespace('Domicilary')->prefix('domicilary')->name('domicilary.')->middleware('auth', 'role:domicilary')->group(function() {
    Route::resource('addresses', 'AddressController');
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::route('home.index');
})->name('logout');