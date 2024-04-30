<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::post('/login',[LoginController::class, 'login'])->name('login.log');


Route::get('reservas', [AppointmentController::class, 'index'])->name('appointment.index');
Route::middleware('auth')->group(function(){
    Route::get('reservas/novo', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('reservas', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('reservas/{appointment}/editar', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::put('reservas/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('reservas/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
});
Route::get('reservas/busca/{laboratory}/{day}',[AppointmentController::class,'getDay'])->name('get.day');


Route::get('laboratorios', [LaboratoryController::class, 'index'])->name('laboratory.index');
Route::middleware('auth')->group(function(){
    Route::get('laboratorios/novo',[LaboratoryController::class, 'create'])->name('laboratory.create');
    Route::delete('laboratorios/{laboratory}', [LaboratoryController::class, 'destroy'])->name('laboratory.destroy');
    Route::post('laboratorios', [LaboratoryController::class, 'store'])->name('laboratory.store');
    Route::get('laboratorios/{laboratory}/editar', [LaboratoryController::class, 'edit'])->name('laboratory.edit');
    Route::put('laboratorios/{laboratory}', [LaboratoryController::class, 'update'])->name('laboratory.update');
});
Route::get('laboratorios/{laboratory}', [LaboratoryController::class, 'show'])->name('laboratory.show');    //NÃO MUDA A ORDEM


Route::resource('usuarios','App\Http\Controllers\UserController')->names('user')->parameters(['usuarios'=>'user']);