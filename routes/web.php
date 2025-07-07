<?php

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

Route::get('/', [App\Http\Controllers\DataController::class, 'index']);
Route::get('/page_add', [App\Http\Controllers\DataController::class, 'page_add']);
Route::post('/create', [App\Http\Controllers\DataController::class, 'create']);
Route::get('/page_edit', [App\Http\Controllers\DataController::class, 'page_edit']);
Route::put('/update', [App\Http\Controllers\DataController::class, 'update']);
Route::delete('/delete', [App\Http\Controllers\DataController::class, 'delete']);