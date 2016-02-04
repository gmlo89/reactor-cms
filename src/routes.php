<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Gmlo\CMS\Controllers', 'as' => 'CMS::', 'middleware' => ['web']], function ()
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


    // Categories
    Route::resource('categories', 'CategoriesController');

    // Articles
    Route::resource('articles', 'ArticlesController');
    Route::put('articles/toggle-status/{id}', ['as' => 'admin.articles.toggle-status', 'uses' => 'ArticlesController@toggleStatus']);

    // Media Manager
    Route::get('media-manager', ['as' => 'admin.media-manager.index', 'uses' => 'MediaManagerController@index']);
    Route::post('media-manager/finder', ['as' => 'admin.media-manager.finder', 'uses' => 'MediaManagerController@finder']);
    Route::post('media-manager/upload', ['as' => 'admin.media-manager.upload', 'uses' => 'MediaManagerController@upload']);
    Route::get('media-manager/assets', ['as' => 'admin.media-manager.assets', 'uses' => 'MediaManagerController@getAssets']);
    Route::put('media-manager/update', ['as' => 'admin.media-manager.update', 'uses' => 'MediaManagerController@update']);
    Route::delete('media-manager/destroy', ['as' => 'admin.media-manager.destroy', 'uses' => 'MediaManagerController@destroy']);
});
