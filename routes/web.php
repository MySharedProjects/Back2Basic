<?php

Auth::routes();

Route::get('/', 'MainController@home')->name('home');

Route::get('/login', 'MainController@login')->name('login');

Route::post('/logincheck', 'MainController@logincheck')->name('/logincheck');
