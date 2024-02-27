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

Route::get('', 'App\Http\Controllers\HomeController@index');


Route::resource('reservas','App\Http\Controllers\AppointmentController')->names('appointment')->parameters(['reservas'=>'appointment'])
->except('show');
//Route::get('reservas/novo/{data?}','App\Http\Controllers\AppointmentController@create')->name('appointment.create');
Route::get('reservas/busca/{laboratory}/{day}','App\Http\Controllers\AppointmentController@getDay')->name('get.day');

Route::resource('laboratorios','App\Http\Controllers\LaboratoryController')->names('laboratory')->parameters(['laboratorios'=>'laboratory']);

Route::resource('usuarios','App\Http\Controllers\UserController')->names('user')->parameters(['usuarios'=>'user']);