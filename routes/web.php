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
    return view('index');
});

Route::get('/account/view', [\App\Http\Controllers\AccountController::class, 'view'])->middleware(['auth'])->name('dashboard');

Route::resource('boards', \App\Http\Controllers\BoardController::class);
Route::resource('boards.records', \App\Http\Controllers\BoardManualRecordController::class);
Route::resource('boardusers', \App\Http\Controllers\Board_UsersController::class);
Route::resource('boards.category', \App\Http\Controllers\BoardEconomicCategoryController::class);


require __DIR__.'/auth.php';
