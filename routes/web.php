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
    return view('vignette');
});

Auth::routes();

Route::post('createUserWithTicket', 'UserController@createWithTicket');

Route::get('/home', 'HomeController@index')->name('home');
/* Admin routes */
Route::get('/admin/consultation', 'UserController@index');
Route::get('/admin/modify-user', 'UserController@edit');
Route::get('/gestionExposant', function () {
    return view('gestionExposant');
});
/* Billeterie - Enregistremet user */
Route::get('/billeterie', 'BilleterieController@displayForm');
/* User profile */
Route::get('/profil', 'UserController@show');
Route::post('/profil', 'UserController@updateProfile');


/* Exposants */
Route::get('/gestionTest', function () {
    return view('gestionTest');
});

Route::resource('exposant/catalogue', 'ProductController', ['except'=>['fullCatalogue']]);

Route::get('/gestion-utilisateurs', 'UserController@index');

Route::get('/', function () {
    return view('home');
});

Route::post('/product/postModelNumber', 'ProductController@postModelNumber');

Route::post('createBike', 'BikeController@createBike');
