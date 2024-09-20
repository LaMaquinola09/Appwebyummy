<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\RepartidorDashboardController; // Asegúrate de crear este controlador
use App\Http\Controllers\RestauranteDashboardController; // Asegúrate de crear este controlador
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\RepartidorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes');

// Guardar los datos enviados del formulario
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');





// Ruta general del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para el admin
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/catalogo', [CatalogoController::class, 'index'])->name('admin.catalogo');
    Route::get('/admin/producto', [ProductoController::class, 'index'])->name('admin.producto');
});

// Rutas para el repartidor
Route::middleware(['auth', 'rol:repartidor'])->group(function () {
    Route::get('/repartidor/dashboard', [RepartidorDashboardController::class, 'index'])->name('repartidor.dashboard');
    Route::get('/repartidor/pedidos', [RepartidorController::class, 'index'])->name('repartidor.pedidos'); // Asegúrate de tener este controlador
});

// Rutas para el usuario regular
Route::middleware(['auth'])->group(function () {
    Route::get('/cliente/dashboard', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');
    Route::get('/cliente/historial', [ClienteController::class, 'historial'])->name('cliente.historial');
});

// Rutas para el restaurante
Route::middleware(['auth', 'rol:restaurante'])->group(function () {
    Route::get('/restaurante/dashboard', [RestauranteDashboardController::class, 'index'])->name('restaurante.dashboard');
    Route::get('/restaurante/menu', [RestauranteController::class, 'index'])->name('restaurante.menu'); // Asegúrate de tener este controlador
});

// Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rutas para Pedidos
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos');
    
    // Rutas para Restaurantes
    Route::get('/restaurantes', [RestauranteController::class, 'index'])->name('restaurants');
    
    // Rutas para Repartidores
    Route::get('/repartidores', [RepartidorController::class, 'index'])->name('drivers');
});

require __DIR__.'/auth.php';
