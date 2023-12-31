<?php

use App\Http\Controllers\DishesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use GuzzleHttp\Middleware;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/menuItem', [DishesController::class, 'index'])->name('dishes.index');
    Route::get('/menuItem/new', [DishesController::class, 'create'])->name('dishes.create');
    Route::post('/menuItem/new', [DishesController::class, 'store'])->name('dishes.store');
    Route::get('/menuItem/{menuItem}', [DishesController::class, 'edit'])->name('dishes.edit');
    Route::patch('/menuItem/{menuItem}', [DishesController::class, 'update'])->name('dishes.update');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::patch('/menu/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::get('/menu/new', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/new', [MenuController::class, 'store'])->name('menu.store');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
