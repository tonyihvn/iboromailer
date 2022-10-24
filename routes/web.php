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
    return view('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// MATERIALS
Route::get('/materials', [App\Http\Controllers\MaterialsController::class, 'index'])->name('materials')->middleware('role:Admin,Super,Staff');
Route::post('/addmaterial', [App\Http\Controllers\MaterialsController::class, 'store'])->name('addmaterial')->middleware('role:Admin,Super,Staff');
Route::get('/material/{id}', [App\Http\Controllers\MaterialsController::class, 'material'])->name('material');
Route::get('/delete-mat/{id}', [App\Http\Controllers\MaterialsController::class, 'destroy'])->name('delete-mat')->middleware('role:Admin,Super,Staff');
