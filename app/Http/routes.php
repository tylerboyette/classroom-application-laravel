<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * If the user is not logged in, display a login form,
 * otherwise, show the home page
 * 
 */
Route::get('/', function () {
    if (Auth::guest()) {
      return view('auth.login');
    } else {
      return redirect('/home');
    }
});

Route::auth();

Route::get('/home', 'HomeController@index');

/**
 * User Routes
 */
Route::get('/profile', 'UserController@show');
Route::post('/profile/update', 'UserController@update');

/**
 * Course Routes
 */
Route::get('/course/create', 'CourseController@create');
Route::get('/course/{id}', 'CourseController@show');

Route::post('/course', 'CourseController@store');
Route::put('/course/{id}', 'CourseController@update');
Route::delete('/course/{id}', 'CourseController@destroy');

/**
 * Assignemnt Routes
 * 
 */
Route::post('/course/{id}/assignment', 'AssignmentController@store');
Route::get('/course/{course_id}/assignment/{assignment_id}', 'AssignmentController@show');
Route::delete('/course/{course_id}/assignment/{assignment_id}', 'AssignmentController@destroy');

