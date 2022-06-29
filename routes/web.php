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

//HOME
Route:: get('/home','App\\Http\\Controllers\\homeController@index')->name('home');

//LOGIN
Route:: get('/login','App\\Http\\Controllers\\loginController@index')->name('login');
Route:: post('/login/check','App\\Http\\Controllers\\loginController@checkLogin')->name('checkUser');
Route:: get('/logout','App\\Http\\Controllers\\loginController@logout')->name('logout');

//SIGNUP
Route:: get('/signup','App\\Http\\Controllers\\signupController@index')->name('signup'); 
Route:: post('/signup/check','App\\Http\\Controllers\\signupController@create')->name('createUser');
Route:: get('/signup/email/{email}','App\\Http\\Controllers\\signupController@checkEmail');
Route:: get('/signup/username/{username}','App\\Http\\Controllers\\signupController@checkUsername');

Route:: get('/cliente','App\\Http\\Controllers\\clienteController@index')->name('profilo');
Route::get('/cliente/stampa','App\\Http\\Controllers\\clienteController@stampa_post_preferiti');

//API
Route::get('/create','App\\Http\\Controllers\\apiController@fetch_logo');
Route::get('/carica_post/{link}/{decsrizione}','App\\Http\\Controllers\\apiController@caricaPost');

//BLOG
Route:: get('/blog','App\\Http\\Controllers\\blogController@index')->name('blog');
Route::get('/blog/stampa','App\\Http\\Controllers\\blogController@stampa_post');

//GESTIONE LIKES
Route:: get('/addLike/{p}','App\\Http\\Controllers\\blogController@addLike');
Route:: get('/removeLike/{p}','App\\Http\\Controllers\\blogController@removeLike');

//GESTIONE PREFERTI
Route:: get('/addFavorite/{p}','App\\Http\\Controllers\\blogController@addFavorite');
Route:: get('/removeFavorite/{p}','App\\Http\\Controllers\\blogController@removeFavorite');


Route::get('/', function () {
    return view('welcome');
});


