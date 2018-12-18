<?php

Auth::routes();

Route::get('/', 'MainController@home')->name('home');

Route::get('/login', 'MainController@login')->name('login');

Route::get('/galleryUploads', 'MainController@galleryUploads')->name('galleryUploads');

Route::post('/loggedin', 'MainController@logincheck')->name('/loggedin');

Route::post('image-upload', 'MainController@imageUpload')->name('UploadImage');
