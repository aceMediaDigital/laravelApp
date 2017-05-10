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

/*
\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
    echo "<pre>";
    var_dump($query->sql);
    var_dump($query->bindings);
    var_dump($query->time);
    echo "</pre>";
});
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    /*
     *
     * USERS
     *
     *
     */

//List Users
    Route::get('users', [
        'as' => 'user.index',
        'uses' => 'UserController@index'
    ]);

// Get one user
    Route::get('user/{id}', [
        'as' => 'user',
        'uses' => 'UserController@viewUser'
    ]);

// Get form to create a user
    Route::get('users/create', [
        'as' => 'user.create',
        'uses' => 'UserController@form'
    ]);

    Route::post('users/create', [
        'as' => 'user.create',
        'uses' => 'UserController@userCreate'
    ]);

    Route::post('user/{id}', [
        'as' => 'user',
        'uses' => 'UserController@userUpdate'
    ]);
});