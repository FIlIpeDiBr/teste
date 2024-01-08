<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('site/teste');
});
Route::get('/home', function () {
    return view('site/home');
});
Route::get('/link', function () {
    return view('site/link');
});


Route::resource('usuarios','App\Http\Controllers\Form\UserController')->names('user')->parameters(['usuarios'=>'user']);