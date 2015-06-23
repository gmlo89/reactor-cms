<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Gmlo\CMS\Controllers', 'as' => 'CMS::'], function ()
{
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'AdminController@home']);
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'admin.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);

    Route::get('users/update-my-password', ['as' => 'admin.users.update-my-password', 'uses' => 'UserController@editMyPassword']);
    Route::put('users/update-my-password', ['as' => 'admin.users.update-my-password', 'uses' => 'UserController@updateMyPassword']);
    Route::resource('users', 'UserController');


    Route::get('users/{id}/update-password', ['as' => 'admin.users.update-password', 'uses' => 'UserController@editPassword']);
    Route::put('users/{id}/update-password', ['as' => 'admin.users.update-password', 'uses' => 'UserController@updatePassword']);

    Route::put('users/{id}/status-toggle', ['as' => 'admin.users.status-toggle', 'uses' => 'UserController@statusToggle']);
});