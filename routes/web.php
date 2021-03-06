<?php

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
    return view('thread.index');
});

Route::get('/threads/{id}', function ($id) {
    $result = \App\Thread::findOrFail($id);
    return view('thread.view', compact('result'));
});

Route::get('/locale/{locale}', function($locale){
    session(['locale'=>$locale]);
    return back();
});

Route::get('/login/{provider}', 'SocialAuthController@redirect');
Route::get('/login/{provider}/callback', 'SocialAuthController@callback');
Route::get('/threads', 'ThreadController@index');
Route::get('/replies/{id}', 'ReplyController@show');

Route::middleware(['auth'])
    ->group(function (){


        Route::post('/threads', 'ThreadController@store');
        Route::put('/threads/{id}', 'ThreadController@update');
        Route::get('/threads/{thread}/edit', function(\App\Thread $thread){
            return view('thread.edit', compact('thread'));
        });


        Route::post('/replies', 'ReplyController@store');
        Route::get('/profile', 'ProfileController@edit');
        Route::post('/update', 'ProfileController@update');

    });

Auth::routes();

Route::get('/teste', ['uses' => 'ThreadController@testeGcs']);

Route::get('/home', 'HomeController@index')->name('home');
