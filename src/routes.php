<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Gmlo\CMS\Controllers', 'as' => 'CMS::'], function ()
{
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'AdminController@home']);
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'admin.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);

    Route::resource('users', 'UserController');
});