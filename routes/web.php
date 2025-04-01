<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::group(['prefix' => 'warehouse', 'middleware' => ['auth'],'as' => 'warehouse.'], function () {
    Route::get('/', [WarehouseController::class, 'index'])
        ->name('index');
    Route::get('/create', [WarehouseController::class, 'create'])
        ->name('create');
    Route::post('/', [WarehouseController::class, 'store'])
        ->name('store');
    Route::get('/{warehouse}', [WarehouseController::class, 'show'])
        ->name('show');
    Route::get('/{warehouse}/edit', [WarehouseController::class, 'edit'])
        ->name('edit');
    Route::put('/{id}', [WarehouseController::class, 'update'])
        ->name('update');
    Route::delete('/{warehouse}', [WarehouseController::class, 'destroy'])
        ->name('destroy');
});

Route::group(['prefix' => 'products', 'middleware' => ['auth'],'as' => 'product.'],function () {
    Route::get('/', [ProductController::class, 'index'])
        ->name('index');
    Route::get('/create', [ProductController::class, 'create'])
        ->name('create');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])
        ->name('edit');
    Route::post('/', [ProductController::class, 'store'])
        ->name('store');
    Route::get('{product}', [ProductController::class, 'show'])
        ->name('show');
    Route::put('{product}', [ProductController::class, 'update'])
        ->name('update');
    Route::delete('{product}', [ProductController::class, 'destroy'])
        ->name('destroy');
    Route::patch('{id}/restore', [ProductController::class, 'restore'])
        ->name('restore');
});

Route::prefix('purchases')->middleware('auth')->name('purchases.')->group(function () {
    Route::get('/', [PurchaseController::class, 'index'])
        ->name('index');
    Route::get('/create', [PurchaseController::class, 'create'])
        ->name('create');
    Route::get('/edit/{purchase}', [PurchaseController::class, 'edit'])
        ->name('edit');
    Route::post('/', [PurchaseController::class, 'store'])
        ->name('store');
    Route::get('{purchase}', [PurchaseController::class, 'show'])
        ->name('show');
    Route::put('{purchase}', [PurchaseController::class, 'update'])
        ->name('update');
    Route::delete('{purchase}', [PurchaseController::class, 'destroy'])
        ->name('destroy');
    Route::patch('{id}/restore', [PurchaseController::class, 'restore'])
        ->name('restore');
});


Route::prefix('users')->middleware('auth')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])
        ->name('index');
    Route::get('/create', [UserController::class, 'create'])
        ->name('create');
    Route::get('/edit/{user}', [UserController::class, 'edit'])
        ->name('edit');
    Route::post('/', [UserController::class, 'store'])
        ->name('store');
    Route::get('{user}', [UserController::class, 'show'])
        ->name('show');
    Route::put('{user}', [UserController::class, 'update'])
        ->name('update');
    Route::delete('{user}', [UserController::class, 'destroy'])
        ->name('destroy');
    Route::patch('{id}/restore', [UserController::class, 'restore'])
        ->name('restore');
});


Route::prefix('categories')->middleware('auth')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('index');
    Route::get('/create', [CategoryController::class, 'create'])
        ->name('create');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])
        ->name('edit');
    Route::post('/', [CategoryController::class, 'store'])
        ->name('store');
    Route::get('{category}', [CategoryController::class, 'show'])
        ->name('show');
    Route::put('{category}', [CategoryController::class, 'update'])
        ->name('update');
    Route::delete('{category}', [CategoryController::class, 'destroy'])
        ->name('destroy');
    Route::patch('{id}/restore', [CategoryController::class, 'restore'])
        ->name('restore');
});
