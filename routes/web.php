<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/form', function () {
	return view('contact_form.form');
});

Route::get('/fileuploads', function () {
	return view('multiple_fileupload.index');
});

Route::get('/image-uploads', function () {
	return view('image_upload.index');
});
