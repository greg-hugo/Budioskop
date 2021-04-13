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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/index', 'FilmController@film_list')->name('index');
    Route::get('/film/{id}', 'FilmController@show')->name('film.show');
    Route::get('/new', 'FilmController@new_film')->name('new');
    Route::post('/new/add', 'FilmController@add')->name('film.add');
    Route::get('/film/edit/{id}','FilmController@edit')->name('film.edit');
    Route::patch('/film/update/{id}','FilmController@update')->name('film.update');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::delete('/film/delete/{id}','FilmController@destroy')->name('film.del');
    Route::post('comment/new', 'CommentController@store')->name('post.comment');
    Route::get('/comment/edit/{id}','CommentController@edit')->name('edit.comment');
    Route::patch('/comment/update/{id}','CommentController@update')->name('update.comment');
});


Route::get('/', function(){
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
