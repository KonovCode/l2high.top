<?php

use App\Http\Controllers\AdminDashboard\BannerController;
use App\Http\Controllers\AdminDashboard\PriceController;
use App\Http\Controllers\AdminDashboard\ProjectController;
use App\Http\Controllers\AdminDashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkLogotypeController;
use App\Http\Controllers\UserDashboard\ProjectUserController;
use App\Models\Banner;
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

// Route::get('/', function () {
//     Banner::check_term();
//     return Inertia::render('Home', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/l2high-logo', LinkLogotypeController::class)->name('get.logotype');

Route::get('/dashboard', [\App\Http\Controllers\UserDashboard\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['can:admin' ,'auth'])->name('admin.')->group(function () {
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::post('/banner-reset/{id}', [BannerController::class, 'reset'])->name('banner.reset');
    Route::post('/banner-active/{id}', [BannerController::class, 'activate'])->name('banner.activate');
    Route::post('/banner-unactive/{id}', [BannerController::class, 'unactivate'])->name('banner.unactivate');
    Route::get('/banner-download/{id}', [BannerController::class, 'download'])->name('banner.download');
    Route::post('/banner-upload', [BannerController::class, 'upload'])->name('banner.upload');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/user-update-balance/{id}', [UserController::class, 'updateBalance'])->name('user.update.balance');
    Route::post('/user-block/{id}', [UserController::class, 'blockUser'])->name('block.user');
    Route::post('/user-unlock/{id}', [UserController::class, 'unblockUser'])->name('unblock.user');
    Route::get('/price', [\App\Http\Controllers\AdminDashboard\PriceController::class, 'index'])->name('price');
    Route::post('/update-price/{id}', [PriceController::class, 'updatePrice'])->name('update.price');
    Route::resources([
        'projects' => ProjectController::class,
    ]);
    Route::post('/project-public/{id}', [ProjectController::class, 'projectAddPublic'])->name('project.add.public');
    Route::post('/project-remove-public/{id}', [ProjectController::class, 'projectRemovePublic'])->name('project.remove.public');
});

Route::middleware(['can:user', 'auth', 'verified'])->group(function () {
    Route::get('/status', [\App\Http\Controllers\UserDashboard\StatusController::class, 'index'])->name('status');
    Route::get('/status/top/{id?}', [\App\Http\Controllers\UserDashboard\StatusController::class, 'top'])->name('status.top');
    Route::get('/status/vip/{id?}', [\App\Http\Controllers\UserDashboard\StatusController::class, 'vip'])->name('status.vip');
    Route::get('/status/premium/{id?}', [\App\Http\Controllers\UserDashboard\StatusController::class, 'premium'])->name('status.premium');
    Route::get('/reclame', [\App\Http\Controllers\UserDashboard\ReclameController::class, 'index'])->name('reclame');
   
    Route::get('/project-create', [ProjectUserController::class, 'create'])->name('project.create');
    Route::post('/project-store', [ProjectUserController::class, 'store'])->name('project.store');
    Route::get('/project-delete/{id}', [ProjectUserController::class, 'queryDelete'])->name('project.delete');
    Route::get('/project-un-delete/{id}', [ProjectUserController::class, 'queryUnDelete'])->name('project.un.delete');
    
    Route::post('/buy', \App\Http\Controllers\UserDashboard\BuyStatusController::class)->name('buy');
    Route::post('/buy-premium', \App\Http\Controllers\UserDashboard\BuyPremiumController::class)->name('buy-premium');
    Route::resources([
        'user-banners' => \App\Http\Controllers\UserDashboard\BannerUserController::class,
    ]);
});




require __DIR__.'/auth.php';
