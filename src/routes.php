<?php

Route::group(['prefix' => 'admin'], function ()
{
    Route::get('/', ['as' => 'cms.home', 'uses' => 'Gmlo\CMS\Controllers\AdminController@home']);
    Route::get('login', ['as' => 'cms.login', 'uses' => 'Gmlo\CMS\Controllers\AuthController@getLogin']);
    Route::post('login', ['as' => 'cms.login', 'uses' => 'Gmlo\CMS\Controllers\AuthController@postLogin']);
    Route::get('logout', ['as' => 'cms.logout', 'uses' => 'Gmlo\CMS\Controllers\AuthController@getLogout']);
});