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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/agenda', function () {
    return redirect('/agenda0926');
});

Route::get('/agenda0926', function () {
    return view('pages.agenda0926');
});

Route::get('/agenda0927', function () {
    return view('pages.agenda0927');
});

Route::get('/map', function () {
    return view('pages.map');
});

Route::get('/speaker', function () {
    return view('pages.speaker');
});
