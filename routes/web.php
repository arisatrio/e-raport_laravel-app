<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeAdmin'])->name('dashboard');
    });
});

Route::middleware(['auth', 'walas'])->group(function () {
    Route::prefix('walas')->name('walas.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeWalas'])->name('dashboard');
    });
});

Route::middleware(['auth', 'guru'])->group(function () {
    Route::prefix('guru')->name('guru.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeGuru'])->name('dashboard');
    });
});

Route::middleware(['auth', 'murid'])->group(function () {
    Route::prefix('murid')->name('murid.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeMurid'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';