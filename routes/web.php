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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', function () {
    return view('home');
});
Route::get('/ingresarcurso', function () {
    return view('ingresarcurso');
});

Route::get('/subjects','SubjectController@index');
Route::get('/subject/{id}','SubjectController@show');
Route::post('/subject/create','SubjectController@store');
Route::put('/subject/update/{id}','SubjectController@update');
Route::delete('/subject/delete/{id}','SubjectController@destroy');

Route::get('/courses','CourseController@index');
Route::get('/course/{id}','CourseController@show');
Route::post('/course/create','CourseController@store');
Route::put('/course/update/{id}','CourseController@update');
Route::delete('/course/delete/{id}','CourseController@destroy');