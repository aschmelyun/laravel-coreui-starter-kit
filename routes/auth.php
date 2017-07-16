<?php

Route::get('/sign-in', [
    'as'    => 'signin.index',
    'uses'  => 'Auth\SigninController@index'
]);

Route::post('/sign-in', [
    'as'    => 'signin.post',
    'uses'  => 'Auth\SigninController@post'
]);

Route::get('/register', [
    'as'    => 'register.index',
    'uses'  => 'Auth\RegisterController@index'
]);

Route::post('/register', [
    'as'    => 'register.post',
    'uses'  => 'Auth\RegisterController@post'
]);

Route::get('/forgot-password', [
    'as'    => 'forgot.index',
    'uses'  => 'Auth\ForgotPasswordController@index'
]);

Route::post('/forgot-password', [
    'as'    => 'forgot.post',
    'uses'  => 'Auth\ForgotPasswordController@post'
]);
