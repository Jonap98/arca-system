<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\catalogs\EstatusEmpresaController;
use App\Http\Controllers\catalogs\CategoriasEmpleadoController;
use App\Http\Controllers\catalogs\OcupacionesController;
use App\Http\Controllers\catalogs\PaisesController;
use App\Http\Controllers\catalogs\ParentescosController;
use App\Http\Controllers\catalogs\PeriocidadController;
use App\Http\Controllers\catalogs\TipoPrestamoController;
use App\Http\Controllers\catalogs\TipoIdentificacionController;


Route::get('/', function () {
    return view('home');
});


// ==================================================
// Catálogos
// ==================================================

// Estatus empresa
Route::get('estatus-empresa', [EstatusEmpresaController::class, 'index'])->name('estatus-empresa');

// Categorías empleado
Route::get('categorias-empleado', [CategoriasEmpleadoController::class, 'index'])->name('categorias-empleado');

// Ocupaciones
Route::get('ocupaciones', [OcupacionesController::class, 'index'])->name('ocupaciones');

// Paises
Route::get('paises', [PaisesController::class, 'index'])->name('paises');

// Parentescos
Route::get('parentescos', [ParentescosController::class, 'index'])->name('parentescos');

// Periocidad
Route::get('periocidades', [PeriocidadController::class, 'index'])->name('periocidades');

// Tipo de préstamo
Route::get('tipo-prestamo', [TipoPrestamoController::class, 'index'])->name('tipo-prestamo');

// Tipo de identificación
Route::get('tipo-identificacion', [TipoIdentificacionController::class, 'index'])->name('tipo-identificacion');


