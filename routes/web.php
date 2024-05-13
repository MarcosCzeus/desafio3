<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController; // Importa el controlador de empleados

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes();

// Ruta para la página de inicio después de iniciar sesión
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Definir rutas para el CRUD de empleados
Route::resource('employees', EmployeeController::class)->middleware('auth');

