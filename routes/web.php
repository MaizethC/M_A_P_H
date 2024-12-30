<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

// Bandeja de entrada
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

// Detalle de un mensaje
Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');

// Responder a un mensaje
Route::post('/messages/{id}/reply', [MessageController::class, 'reply'])->name('messages.reply');

Route::get('/appointments', [AppointmentController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/// Listado de usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Activar usuario
Route::put('/users/{id}/activate', [UserController::class, 'activate'])->name('users.activate');

// Desactivar usuario
Route::put('/users/{id}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');