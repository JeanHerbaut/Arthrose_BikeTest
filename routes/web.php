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

Route::get('/vignette', function () {
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

/*catalogue*/
Route::get('/catalogue', 'ProductController@index');

Route::get('/velo/{id}', 'ProductController@show');



Route::get('/home', 'HomeController@index')->name('home');
/* Admin routes */
Route::get('/admin/consultation', 'UserController@index');
Route::get('/admin/modify-user', 'UserController@edit');
Route::post('/admin/modify-user', 'UserController@updateUser');
Route::get('/gestion-exposant', 'ExhibitorController@index');
Route::post('/gestion-exposant', 'ExhibitorController@exhibitorDatas');
Route::post('/gestion-exposant/create', 'ExhibitorController@store');

/* Billeterie - Enregistremet user */
Route::get('/billeterie', 'BilleterieController@displayForm');
Route::post('/createUserWithTicket', 'UserController@createWithTicket');
/* User profile */
Route::get('/profil', 'UserController@show');
Route::post('/profil', 'UserController@updateProfile');

/* Exposants */
Route::resource('exposant/catalogue', 'BikeController', ['except'=>['fullCatalogue']]);

Route::get('/gestion-utilisateurs', 'UserController@index');

Route::get('/gestion-test-historique', 'TestController@index');


Route::get('/gestion-test', 'TestController@create');

Route::get('/', function () {
    return view('home');
});

Route::post('/product/postModelNumber', 'ProductController@postModelNumber');

Route::post('createBike', 'BikeController@createBike');

Route::post('/addTest', 'TestController@store');
Route::post('/endTest', 'TestController@end');

Route::post('searchUser', 'UserController@search');

Route::get('/register', function () {
    return view('auth/register');
});
