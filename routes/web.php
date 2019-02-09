<?php

Route::get('/welcome', function() {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'StatusController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/notifications', 'UserController@notifications')->name('notifications');


    Route::post('/status', 'StatusController@store');
    Route::get('/status/{status}', 'StatusController@show');
    Route::delete('/status/{status}', 'StatusController@destroy');
    Route::get('/like/{id}', 'StatusController@like');
    Route::post('/comment/{status}', 'CommentController@store');

    Route::get('/search', 'SearchController@search');
    Route::any('/process', 'SearchController@process');
    Route::get('/user/profile/{id}', 'UserController@index');
    Route::post('/profile/picture', 'UserController@picture');
    Route::get('/follow/{id}', 'UserController@follow');
    Route::get('/unfollow/{id}', 'UserController@unfollow');
    Route::get('/peoples', 'UserController@peoples');

    Route::get('/inbox', 'ChatController@inbox');
    Route::get('/messages/{id}', 'ChatController@messages');
    Route::post('/message', 'ChatController@send');
    Route::post('/chat/{id}', 'ChatController@start');
});