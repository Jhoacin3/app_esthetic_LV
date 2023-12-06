<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/client', function () {
    return Inertia::render('Welcome_cliente', [
        'canLogin' => Route::has('login-cliente'),
        'canRegister' => Route::has('register-cliente'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('client')->middleware('guest');

Route::get('/dashboard-cliente', function () {
    return Inertia::render('Dashboard_cliente');
    })->middleware(['auth', 'verified'])->name('dashboard_cliente');

    Route::get('/soporte', function () {
        return Inertia::render('Soporte');
        })->middleware(['auth', 'verified'])->name('Soporte');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/users', function () {
//     return Inertia::render('users');
// })->middleware(['auth', 'verified'])->name('users');
// Route::get('/users', [UserController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('users.index');

Route::group(['middleware'=>['auth']], function(){
    
    Route::resource('users',UserController::class);
    Route::resource('roles',RolController::class);
    Route::resource('inventories',InventoryController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('agendas',AgendaController::class);
    // Route::resource('soporte',SoporteController::class);
});
// Route::get('/soporte', function () {
//     return Inertia::render('soporte');
// })->name('soporte.index');

// Route::get('/soporte/create', function () {
//     return Inertia::render('Soporte/Create');
// })->name('soporte.create');

Route::get('/agendas-cliente', function () {
    return Inertia::render('Appointmenscliente');
})->name('Appointmenscliente.index');

// Route::get('/agendas-cliente/create', function () {
//     return Inertia::render('Soporte/Create');
// })->name('soporte.create');

Route::get('/servicios-cliente', function () {
    return Inertia::render('servicescliente');
})->name('servicescliente.index');

Route::get('/alaciado', function () {
    return Inertia::render('alaciado');
})->middleware(['auth', 'verified'])->name('alaciado');

Route::get('/botoxcapilar', function () {
    return Inertia::render('botoxcapilar');
})->middleware(['auth', 'verified'])->name('botoxcapilar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
