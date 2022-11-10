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
use App\Http\Controllers\catalogs\PlantasController;
use App\Http\Controllers\PerfilAhorradorController;
use App\Http\Controllers\AhorroController;
use App\Http\Controllers\DetallesAhorroController;
use App\Http\Controllers\SolicitudPrestamoController;




Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {

    // ==================================================
    // Catálogos
    // ==================================================
    
    // Estatus empresa
    Route::get('estatus-empresa', [EstatusEmpresaController::class, 'index'])->name('estatus-empresa');
    
    // Categorías empleado
    Route::get('categorias-empleado', [CategoriasEmpleadoController::class, 'index'])->name('categorias-empleado');
    Route::post('categorias-empleado/store', [CategoriasEmpleadoController::class, 'store'])->name('categorias-empleado.store');
    
    // Ocupaciones
    Route::get('ocupaciones', [OcupacionesController::class, 'index'])->name('ocupaciones');
    
    // Paises
    Route::get('paises', [PaisesController::class, 'index'])->name('paises');
    Route::post('paises/store', [PaisesController::class, 'store'])->name('paises.store');
    
    // Parentescos
    Route::get('parentescos', [ParentescosController::class, 'index'])->name('parentescos');
    
    // Periocidad
    Route::get('periocidades', [PeriocidadController::class, 'index'])->name('periocidades');
    Route::post('periocidades/store', [PeriocidadController::class, 'store'])->name('periocidades.store');
    
    // Tipo de préstamo
    Route::get('tipo-prestamo', [TipoPrestamoController::class, 'index'])->name('tipo-prestamo');
    Route::post('tipo-prestamo/store', [TipoPrestamoController::class, 'store'])->name('tipo-prestamo.store');
    
    // Tipo de identificación
    Route::get('tipo-identificacion', [TipoIdentificacionController::class, 'index'])->name('tipo-identificacion');
    
    // Plantas
    Route::get('plantas', [PlantasController::class, 'index'])->name('plantas');
    Route::post('plantas/store', [PlantasController::class, 'store'])->name('plantas.store');
    
    
    
    // ==================================================
    // Perfil ahorrador
    // ==================================================
    
    // Index
    Route::get('perfil-ahorrador', [PerfilAhorradorController::class, 'index'])->name('perfil-ahorrador');
    Route::get('perfil-ahorrador/{gmin}/details', [PerfilAhorradorController::class, 'details'])->name('perfil-ahorrador.details');
    Route::get('perfil-ahorrador/create', [PerfilAhorradorController::class, 'create'])->name('perfil-ahorrador.create');
    Route::post('perfil-ahorrador/store', [PerfilAhorradorController::class, 'store'])->name('perfil-ahorrador.store');
    Route::post('perfil-ahorrador/update', [PerfilAhorradorController::class, 'update'])->name('perfil-ahorrador.update');
    Route::post('perfil-ahorrador/delete', [PerfilAhorradorController::class, 'delete'])->name('perfil-ahorrador.delete');
    
    // ==================================================
    // Ahorro
    // ==================================================
    
    Route::get('ahorro', [AhorroController::class, 'index'])->name('ahorro');
    Route::post('ahorro/store', [AhorroController::class, 'store'])->name('ahorro.store');
    Route::post('ahorro/update', [AhorroController::class, 'update'])->name('ahorro.update');
    // Route::post('ahorro/rechazar', [AhorroController::class, 'update'])->name('ahorro.rechazar');
    
    // Detalles ahorro
    Route::get('detalles-ahorro/{gmin}', [DetallesAhorroController::class, 'detalles'])->name('detalles-ahorro');


    // ==================================================
    // Prestamo
    // ==================================================
    // Solicitud de préstamo
    Route::get('solicitud-de-prestamo', [SolicitudPrestamoController::class, 'index'])->name('solicitud-prestamo');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
