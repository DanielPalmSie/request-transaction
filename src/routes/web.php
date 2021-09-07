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
    return view('welcome');
});

Route::get('/test', function () {
    return 'Docker works !';
});

Route::post('/request/callback', 'App\Http\Controllers\ApiController@callback')
    ->name('callback');

Route::get('/success', 'App\Http\Controllers\ApiController@success')
    ->name('success');

Route::get('/fail', 'App\Http\Controllers\ApiController@fail')
    ->name('fail');

