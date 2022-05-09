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

Route::middleware(['admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::patch('/users/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
});




Route::get('/pages', [App\Http\Controllers\PageController::class, 'index'])->name('pages');
Route::get('/pages/create', [App\Http\Controllers\PageController::class, 'create']);
Route::post('/pages/store', [App\Http\Controllers\PageController::class, 'store']);
Route::get('/pages/{id}/edit', [App\Http\Controllers\PageController::class, 'edit']);
Route::patch('/pages/{id}', [App\Http\Controllers\PageController::class, 'update']);
Route::get('/pages/{id}', [App\Http\Controllers\PageController::class, 'destroy']);


Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name("roles");


Route::get('/{id?}', [App\Http\Controllers\NewsController::class, 'index'])->name("dashboard");



require __DIR__.'/auth.php';
