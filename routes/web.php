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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// CLIENTS
Route::get('students', [App\Http\Controllers\HomeController::class, 'students'])->name('students')->middleware('role:Admin,Super');
Route::get('new-student', [App\Http\Controllers\HomeController::class, 'newStudent'])->name('new-student')->middleware('role:Admin,Super');
Route::post('saveStudent', [App\Http\Controllers\HomeController::class, 'saveStudent'])->name('saveStudent')->middleware('role:Admin,Super');
Route::get('edit-student/{cid}', [App\Http\Controllers\HomeController::class, 'editStudent'])->name('edit-student')->middleware('role:Admin,Super');

// BOOKS
Route::get('books', [App\Http\Controllers\BooksController::class, 'index'])->name('books');
Route::get('new-book', [App\Http\Controllers\BooksController::class, 'create'])->name('new-book');
Route::post('saveBook', [App\Http\Controllers\BooksController::class, 'store'])->name('saveBook');
Route::get('edit-book/{bid}', [App\Http\Controllers\BooksController::class, 'editBook'])->name('edit-book');
Route::get('book/{bid}', [App\Http\Controllers\BooksController::class, 'Book'])->name('book');
Route::get('barcodes', [App\Http\Controllers\BooksController::class, 'Barcodes'])->name('barcodes');

Route::get('/checkouts', [App\Http\Controllers\AccessController::class, 'index'])->name('checkouts');
Route::get('/checkout-returned/{bid}', [App\Http\Controllers\BooksController::class, 'Returned'])->name('checkout-returned')->middleware('role:Super,Admin');
Route::get('/checkout-lost/{bid}', [App\Http\Controllers\BooksController::class, 'Lost'])->name('checkout-lost')->middleware('role:Super,Admin');


// SEARCH
Route::post('searchByISBN', [App\Http\Controllers\BooksController::class, 'searchByISBN'])->name('searchByISBN');
Route::post('searchByKeyword', [App\Http\Controllers\BooksController::class, 'searchByKeyword'])->name('searchByKeyword');


// CHECKOUTS
Route::get('checkout/{bid}', [App\Http\Controllers\AccessController::class, 'Checkout'])->name('checkout');
Route::post('saveCheckout', [App\Http\Controllers\AccessController::class, 'store'])->name('saveCheckout');

//TASK
Route::get('tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');
Route::get('task/{tid}', [App\Http\Controllers\TasksController::class, 'viewTask'])->name('task');
Route::post('change_task_status', [App\Http\Controllers\TasksController::class, 'change_task_status'])->name('change_task_status');
Route::get('del-task/{tid}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('del-task');
Route::get('new-task', [App\Http\Controllers\TasksController::class, 'newTask'])->name('new-task');
Route::post('saveTask', [App\Http\Controllers\TasksController::class, 'saveTask'])->name('saveTask');
Route::get('/completetask/{id}', [App\Http\Controllers\TasksController::class, 'completetask'])->name('completetask')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/inprogresstask/{id}', [App\Http\Controllers\TasksController::class, 'inprogresstask'])->name('inprogresstask')->middleware('role:Worker,Admin,Followup,Pastor,Super');

// PEOPLE
Route::get('staff', [App\Http\Controllers\HomeController::class, 'Staff'])->name('staff')->middleware('role:Admin,Super');
Route::get('suppliers', [App\Http\Controllers\HomeController::class, 'Suppliers'])->name('suppliers')->middleware('role:Admin,Super');
Route::get('new-supplier', [App\Http\Controllers\HomeController::class, 'newSupplier'])->name('new-supplier');
Route::get('new-staff', [App\Http\Controllers\HomeController::class, 'newStaff'])->name('new-staff');
Route::get('edit-supplier/{cid}', [App\Http\Controllers\HomeController::class, 'editSupplier'])->name('edit-supplier');
Route::get('edit-staff/{cid}', [App\Http\Controllers\HomeController::class, 'editStaff'])->name('edit-staff');

// SUPPLIES
Route::post('/saveSupply', [App\Http\Controllers\SuppliesController::class, 'store'])->name('saveSupply')->middleware('role:Admin,Super,Staff');
Route::get('/delete-sp/{id}', [App\Http\Controllers\SuppliesController::class, 'destroy'])->name('delete-sp')->middleware('role:Admin,Super,Staff');

// CATEGORIES
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories')->middleware('role:Finance,Admin,Super');
Route::post('/addcategory', [App\Http\Controllers\CategoriesController::class, 'store'])->name('addcategory')->middleware('role:Finance,Admin,Super');
Route::get('/delete-cat/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('delete-cat')->middleware('role:Super');
Route::post('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings')->middleware('role:Super');

//LOGOUT
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
