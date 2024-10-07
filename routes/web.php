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
Route::get('/deleteMail/{sent_id}', [App\Http\Controllers\SentmailsController::class, 'deleteMail'])->name('deleteMail')->middleware('role:Super');

Route::get('/reservations', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservations');


Route::get('/reservation-create', [ReservationController::class, 'create'])->name('reservation-create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');


Route::get('/contact-create', [ContactsController::class, 'create'])->name('contact-create');
Route::post('/savecontacts', [ContactsController::class, 'store'])->name('savecontacts');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::get('/delete-client/{cid}', [ContactsController::class, 'deleteContact'])->name('deleteContact')->middleware('role:Super,Admin');
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');

//UPLOAD SUMMERNOTE IMAGE
Route::post('/upload-image', [App\Http\Controllers\EmailController::class, 'uploadImage'])->name('upload-image');

// EVENTS
Route::get('/createEvent', [App\Http\Controllers\HomeController::class, 'createEvent'])->name('createEvent')->middleware('role:Super,Admin');
Route::get('/events', [App\Http\Controllers\HomeController::class, 'events'])->name('events')->middleware('role:Super');
Route::get('/edit-event/{event_id}', [App\Http\Controllers\HomeController::class, 'editEvent'])->name('editEvent')->middleware('role:Super');

Route::get('/event/{event_id}', [App\Http\Controllers\HomeController::class, 'event'])->name('event');
Route::get('/postevent/{event_id}', [App\Http\Controllers\HomeController::class, 'addPostEvent'])->name('postevent');
Route::post('/publishPostEvent', [App\Http\Controllers\HomeController::class, 'publishPostEvent'])->name('publishPostEvent')->middleware('role:Super,Admin');
Route::get('/deleteEvent/{event_id}', [App\Http\Controllers\HomeController::class, 'deleteEvent'])->name('deleteEvent')->middleware('role:Super');

Route::get('/userss', [App\Http\Controllers\HomeController::class, 'users'])->name('userss')->middleware('role:Super');
Route::get('/createUser', [App\Http\Controllers\HomeController::class, 'createUser'])->name('createUser')->middleware('role:Super');
Route::post('/addUser', [App\Http\Controllers\HomeController::class, 'addUser'])->name('addUser')->middleware('role:Super');
Route::get('/deleteUser/{delUser}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('deleteUser')->middleware('role:Super');

Route::post('/publishEvent', [App\Http\Controllers\HomeController::class, 'publishEvent'])->name('publishEvent')->middleware('role:Super');
Route::post('/registerEvent', [App\Http\Controllers\HomeController::class, 'registerEvent'])->name('registerEvent')->middleware('role:Super');
Route::get('/registrations', [App\Http\Controllers\HomeController::class, 'registrations'])->name('registrations')->middleware('role:Super');
Route::get('/approveRegistration/{reg_id}', [App\Http\Controllers\HomeController::class, 'approveRegistration'])->name('approveRegistration')->middleware('role:Super');

// ARTISAN COMMANDS
Route::get('/artisan1/{command}', [App\Http\Controllers\HomeController::class, 'Artisan1']);
Route::get('/artisan2/{command}/{param}', [App\Http\Controllers\HomeController::class, 'Artisan2']);

//LOGOUT
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);
