<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Gmlo\CMS\Controllers', 'as' => 'CMS::'], function ()
{
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'AdminController@home']);
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'admin.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);


    // Password reset link request routes...
    Route::get('password/email', ['as' => 'admin.recover-password', 'uses' => 'PasswordController@getEmail']);
    Route::post('password/email', ['as' => 'admin.recover-password', 'uses' => 'PasswordController@postEmail']);

    // Password reset routes...
    Route::get('password/reset/{token}', ['as' => 'admin.reset-password', 'uses' => 'PasswordController@getReset']);
    Route::post('password/reset', ['as' => 'admin.reset-password', 'uses' => 'PasswordController@postReset']);

    Route::get('users/update-my-password', ['as' => 'admin.users.update-my-password', 'uses' => 'UserController@editMyPassword']);
    Route::put('users/update-my-password', ['as' => 'admin.users.update-my-password', 'uses' => 'UserController@updateMyPassword']);
    Route::resource('users', 'UserController');


    Route::get('users/{id}/update-password', ['as' => 'admin.users.update-password', 'uses' => 'UserController@editPassword']);
    Route::put('users/{id}/update-password', ['as' => 'admin.users.update-password', 'uses' => 'UserController@updatePassword']);

    Route::put('users/{id}/status-toggle', ['as' => 'admin.users.status-toggle', 'uses' => 'UserController@statusToggle']);
});