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

Route::get('/', [
    'as'    => 'page.index',
    'uses'  => 'PageController@index'
]);

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {

    Route::get('/', [
        'as'    => 'dashboard.index',
        'uses'  => 'DashboardController@index'
    ]);

    Route::get('/sign-out', [
        'as'    => 'auth.signout',
        'uses'  => 'Auth\SigninController@signout'
    ]);

});
