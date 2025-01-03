<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

// Ruta para mostrar el formulario de edición de perfil
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Ruta para actualizar el perfil
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Definir la ruta para el lobby
Route::get('/lobby', function() {
    return view('lobby');
})->name('lobby');

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



