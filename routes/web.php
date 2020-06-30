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
/*mes velos*/
Route::get('/mesvelos', function () {
    return view('mesVelos');
});
Route::get('/mesvelos/test', function () {
    return view('test1');
});

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
Route::post('/admin/modify-user', 'UserController@updateUser');

/* Exposants */
Route::resource('exposant/catalogue', 'ProductController', ['except'=>['fullCatalogue']]);

Route::get('/gestion-utilisateurs', 'UserController@index');

Route::get('/gestion-test-historique', 'TestController@index');

Route::get('/gestionTest', 'TestController@create');

Route::get('/', function () {
    return view('home');
});

Route::post('/product/postModelNumber', 'ProductController@postModelNumber');

Route::post('createBike', 'BikeController@createBike');

Route::post('/addTest', 'TestController@store');
Route::post('/endTest', 'TestController@end');

Route::post('searchUser', 'UserController@search');

Route::get('/register', function () {
    return view('auth/register');});
