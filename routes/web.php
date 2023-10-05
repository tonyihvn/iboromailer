<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

use App\Http\Controllers\ReservationController;
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
Route::post('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings')->middleware('role:Super');

Route::get('/email-form', [App\Http\Controllers\EmailController::class, 'showForm'])->name('email-form');
Route::post('/send-email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/sentmails', [App\Http\Controllers\SentmailsController::class, 'index'])->name('sentmails');
Route::get('/mail/{mid}', [App\Http\Controllers\SentmailsController::class, 'mail'])->name('mail');

Route::get('/reservations', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservations');


Route::get('/reservation-create', [ReservationController::class, 'create'])->name('reservation-create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');


Route::get('/contact-create', [ContactsController::class, 'create'])->name('contact-create');
Route::post('/savecontacts', [ContactsController::class, 'store'])->name('savecontacts');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');


// ARTISAN COMMANDS
Route::get('/artisan1/{command}', [App\Http\Controllers\HomeController::class, 'Artisan1']);
Route::get('/artisan2/{command}/{param}', [App\Http\Controllers\HomeController::class, 'Artisan2']);

//LOGOUT
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
