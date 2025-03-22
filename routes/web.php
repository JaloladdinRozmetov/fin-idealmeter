<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['prefix' => 'warehouse', 'middleware' => ['auth'],'as' => 'warehouse.'], function () {
    // Get all warehouses
    Route::get('/', [WarehouseController::class, 'index'])
        ->name('index');

    // Show create warehouse form
    Route::get('/create', [WarehouseController::class, 'create'])
        ->name('create');

    // Store new warehouse
    Route::post('/', [WarehouseController::class, 'store'])
        ->name('store');

    // Show specific warehouse
    Route::get('/{warehouse}', [WarehouseController::class, 'show'])
        ->name('show');

    // Show edit warehouse form
    Route::get('/{warehouse}/edit', [WarehouseController::class, 'edit'])
        ->name('edit');

    // Update warehouse
    Route::put('/{id}', [WarehouseController::class, 'update'])
        ->name('update');

    // Delete warehouse
    Route::delete('/{warehouse}', [WarehouseController::class, 'destroy'])
        ->name('destroy');
});
