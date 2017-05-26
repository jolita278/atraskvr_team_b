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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'app.admin.users.index', 'uses' => 'VRUsersController@adminIndex']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VRUsersController@adminShow']);
            Route::get('/edit', ['as' => 'app.admin.users.edit', 'uses' => 'VRUsersController@adminEdit']);
            Route::post('/edit', ['uses' => 'VRUsersController@adminUpdate']);
            Route::delete('/', ['as' => 'app.admin.users.showDelete', 'uses' => 'VRUsersController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'upload'], function () {
        Route::get('/', ['as' => 'app.admin.resources.index', 'uses' => 'VRResourcesController@adminIndex']);
        Route::get('/create', ['uses' => 'VRResourcesController@adminCreate']);
        Route::post('/create', ['as' => 'app.admin.resources.store', 'uses' => 'VRResourcesController@adminStore']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VRResourcesController@adminShow']);
            Route::delete('/', ['as' => 'app.admin.resources.showDelete', 'uses' => 'VRResourcesController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', ['as' => 'app.admin.languages.index', 'uses' => 'VRLanguagesController@adminIndex']);
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'app.admin.categories.index', 'uses' => 'VRCategoriesController@adminIndex']);
    });
});


