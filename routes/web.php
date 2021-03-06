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
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
Route::get('/account/view', [\App\Http\Controllers\AccountController::class, 'view'])->name('dashboard');

Route::get('/account/view', [\App\Http\Controllers\AccountController::class, 'view'])->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'view'])->middleware(['auth'])->name('dashboard');
    Route::resource('boards', \App\Http\Controllers\BoardController::class);
    Route::resource('boards.records', \App\Http\Controllers\BoardRecordController::class);
    Route::resource('boards.users', \App\Http\Controllers\BoardUserController::class);
    Route::resource('boards.categories', \App\Http\Controllers\BoardCategoryController::class);
    Route::resource('boards.savingtargets', \App\Http\Controllers\BoardSavingTargetController::class, [
        'parameters' => ['savingtargets' => 'boardsavingtarget']
    ]);
});
});
// Authentication Routes...

require __DIR__.'/auth.php';
