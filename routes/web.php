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

Route::get('/', [\App\Http\Controllers\TodoController::class, 'show'])->name('index');
Route::get('/add',[\App\Http\Controllers\TodoController::class,'add'])->name('create');
Route::get('/suppression/{id}', [\App\Http\Controllers\TodoController::class, 'delete'])->name('delete');

Route::get('/modifier/{id}', [\App\Http\Controllers\TodoController::class, 'modForm'])->name('modform');
Route::post('/modifier/{id}', [\App\Http\Controllers\TodoController::class, 'modifier'])->name('modform');


