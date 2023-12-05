<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthClient\LoginClientController;
use App\Http\Controllers\AuthClient\RegisterClientController;

use Laravel\Breeze\Http\Controllers\AuthenticatedSessionController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/client', function () {
    return Inertia::render('Welcome_cliente', [
        'canLogin' => Route::has('login_cliente'),
        'canRegister' => Route::has('register_cliente'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('client')->middleware('guest');

Route::get('/dashboard-cliente', function () {
    return Inertia::render('Dashboard_cliente');
    })->middleware(['auth', 'verified'])->name('dashboard_cliente');

// Route::get('/users', function () {
//     return Inertia::render('users');
// })->middleware(['auth', 'verified'])->name('users');
// Route::get('/users', [UserController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('users.index');

Route::group(['middleware'=>['auth']], function(){
    
    Route::resource('users',UserController::class);
    Route::resource('clients',ClientController::class);
    Route::resource('roles',RolController::class);
    Route::resource('inventories',InventoryController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('agendas',AgendaController::class);
    Route::resource('appointments', AppointmentController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/create', [AppointmentController::class, 'create']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit']);
Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);