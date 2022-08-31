<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [\App\Http\Controllers\UserDashboard\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['can:admin' ,'auth'])->name('admin.')->group(function () {
    Route::get('/banner', [\App\Http\Controllers\AdminDashboard\BannerController::class, 'index'])->name('banner');
    Route::get('/users', [\App\Http\Controllers\AdminDashboard\UserController::class, 'index'])->name('users');
    Route::get('/price', [\App\Http\Controllers\AdminDashboard\PriceController::class, 'index'])->name('price');
    Route::resources([
        'projects' => \App\Http\Controllers\AdminDashboard\ProjectController::class,
    ]);
});

Route::middleware(['can:user', 'auth', 'verified'])->group(function () {
//    Route::get('/добавить', [\App\Http\Controllers\UserDashboard\ProjectUserController::class, 'create'])->name('create');
//    Route::post('/store', [\App\Http\Controllers\UserDashboard\ProjectUserController::class, 'store'])->name('store.project');
    Route::get('/status', [\App\Http\Controllers\UserDashboard\BuyStatusController::class, 'index'])->name('status');
    Route::get('/reclame', [\App\Http\Controllers\UserDashboard\ReclameController::class, 'index'])->name('reclame');
    Route::resources([
       'user-projects' => \App\Http\Controllers\UserDashboard\ProjectUserController::class,
    ]);
});




require __DIR__.'/auth.php';
