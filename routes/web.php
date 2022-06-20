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

// Route::get('/', function () {
//     return view('layout');
// });

Route::get('/', 'PlazaController@index')->name('home');
Route::get('/new_event', 'PlazaController@create')->name('new_event')->middleware('auth');
Route::post('/store', 'PlazaController@store')->name('store');

Route::get('/show_event/{id}', 'PlazaController@show_event')->name('show_event')->middleware('auth');

Route::post('/participar/{id}', 'PlazaController@participar')->name('participar')->middleware('auth');


// Route::get('/login', function(){
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function(){
//     return view('auth.register');
// })->name('register');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
