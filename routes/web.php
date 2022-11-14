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
    return view('home');
});

Auth::routes();

// HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// CLIENTS
Route::get('clients', [App\Http\Controllers\HomeController::class, 'clients'])->name('clients');


// PROJECTS
Route::get('projects', [App\Http\Controllers\ProjectsController::class, 'index'])->name('projects');
Route::get('client-projects/{cid}', [App\Http\Controllers\ProjectsController::class, 'clientProjects'])->name('client-projects');
Route::get('/new-project/{cid}', [App\Http\Controllers\ProjectsController::class, 'create'])->name('new-project');
Route::post('save-project', [App\Http\Controllers\ProjectsController::class, 'store'])->name('save-project');
Route::get('/project-dashboard/{pid}', [App\Http\Controllers\ProjectsController::class, 'projectDashboard'])->name('project-dashboard');


// Route::get('/project-milestone/{cid}', [App\Http\Controllers\ProjectsController::class, 'create'])->name('project-milestone');
// Route::get('/project-task/{cid}', [App\Http\Controllers\ProjectsController::class, 'create'])->name('project-task');


// MILESTONES
Route::get('milestones', [App\Http\Controllers\ProjectMilestonesController::class, 'index'])->name('milestones');
Route::get('new-milestone/{pid}', [App\Http\Controllers\ProjectMilestonesController::class, 'create'])->name('new-milestone');
Route::post('savemilestone', [App\Http\Controllers\ProjectMilestonesController::class, 'saveMilestone'])->name('savemilestone');
Route::get('milestone/{mid}', [App\Http\Controllers\ProjectMilestonesController::class, 'milestone'])->name('milestone');
Route::get('milestone-task/{mid}', [App\Http\Controllers\ProjectMilestonesController::class, 'milestoneTask'])->name('milestone-task');
Route::post('savemilestoneTask', [App\Http\Controllers\ProjectMilestonesController::class, 'saveMilestoneTask'])->name('savemilestoneTask');


//TASK
Route::get('tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');
Route::get('project-task/{tid}', [App\Http\Controllers\TasksController::class, 'create'])->name('project-task');
Route::get('task/{tid}', [App\Http\Controllers\TasksController::class, 'viewTask'])->name('task');
Route::post('addWorkers', [App\Http\Controllers\TasksController::class, 'addWorkers'])->name('addWorkers');
Route::post('addMaterialsUsed', [App\Http\Controllers\TasksController::class, 'addMaterialsUsed'])->name('addMaterialsUsed');
Route::post('change_task_status', [App\Http\Controllers\TasksController::class, 'change_task_status'])->name('change_task_status');


//REPORT
Route::get('milestone-report/{tid}', [App\Http\Controllers\MilestoneReportsController::class, 'create'])->name('milestone-report');

Route::get('new-task-report/{tid}', [App\Http\Controllers\MilestoneReportsController::class, 'newtaskReport'])->name('new-task-report');
Route::post('addtaskreport', [App\Http\Controllers\MilestoneReportsController::class, 'store'])->name('addtaskreport');
Route::get('task-report/{trid}', [App\Http\Controllers\MilestoneReportsController::class, 'milestonetaskReport'])->name('task-report');
Route::post('change_task_report_status', [App\Http\Controllers\MilestoneReportsController::class, 'change_task_report_status'])->name('change_task_report_status');

//REPORT
Route::get('add-file', [App\Http\Controllers\ProjectFilesController::class, 'create'])->name('add-file');
Route::post('save-file', [App\Http\Controllers\ProjectFilesController::class, 'store'])->name('save-file');
Route::get('file/{fid}', [App\Http\Controllers\ProjectFilesController::class, 'file'])->name('file');

// MATERIALS
Route::get('/materials', [App\Http\Controllers\MaterialsController::class, 'index'])->name('materials')->middleware('role:Admin,Super,Staff');
Route::post('/addmaterial', [App\Http\Controllers\MaterialsController::class, 'store'])->name('addmaterial')->middleware('role:Admin,Super,Staff');
Route::get('/material/{id}', [App\Http\Controllers\MaterialsController::class, 'material'])->name('material');
Route::get('/delete-mat/{id}', [App\Http\Controllers\MaterialsController::class, 'destroy'])->name('delete-mat')->middleware('role:Admin,Super,Staff');

// SUPPLIERS
Route::get('/suppliers', [App\Http\Controllers\SuppliersController::class, 'index'])->name('suppliers')->middleware('role:Admin,Super,Staff');
Route::post('/addsupplier', [App\Http\Controllers\SuppliersController::class, 'store'])->name('addsupplier')->middleware('role:Admin,Super,Staff');
Route::get('/supplier/{id}', [App\Http\Controllers\SuppliersController::class, 'supplier'])->name('supplier');
Route::get('/delete-sup/{id}', [App\Http\Controllers\SuppliersController::class, 'destroy'])->name('delete-sup')->middleware('role:Admin,Super,Staff');

// SUPPLIES
Route::get('/supplies', [App\Http\Controllers\MaterialSuppliesController::class, 'index'])->name('supplies')->middleware('role:Admin,Super,Staff');
Route::post('/addsupply', [App\Http\Controllers\MaterialSuppliesController::class, 'store'])->name('addsupply')->middleware('role:Admin,Super,Staff');
Route::get('/supply/{id}', [App\Http\Controllers\MaterialSuppliesController::class, 'supply'])->name('supply');
Route::get('/delete-sp/{id}', [App\Http\Controllers\MaterialSuppliesController::class, 'destroy'])->name('delete-sp')->middleware('role:Admin,Super,Staff');


// MATERIAL CHECKOUTS
Route::get('/mcheckouts', [App\Http\Controllers\MaterialCheckoutsController::class, 'index'])->name('mcheckouts')->middleware('role:Admin,Super,Staff');
Route::post('/addmcheckout', [App\Http\Controllers\MaterialCheckoutsController::class, 'store'])->name('addmcheckout')->middleware('role:Admin,Super,Staff');
Route::get('/delete-mtc/{id}/{mid}/{qty}', [App\Http\Controllers\MaterialCheckoutsController::class, 'destroy'])->name('delete-mtc')->middleware('role:Super');
Route::post('addMaterialsUsed', [App\Http\Controllers\MaterialCheckoutsController::class, 'addMaterialsUsed'])->name('addMaterialsUsed')->middleware('role:Admin,Super,Staff');

// ACCOUNT HEADS
Route::get('/account-heads', [App\Http\Controllers\AccountheadsController::class, 'index'])->name('account-heads')->middleware('role:Finance,Admin,Super');
Route::post('/addaccounthead', [App\Http\Controllers\AccountheadsController::class, 'store'])->name('addaccounthead')->middleware('role:Finance,Admin,Super');
Route::get('/delete-acch/{id}', [App\Http\Controllers\AccountheadsController::class, 'destroy'])->name('delete-acch')->middleware('role:Super');

// ACCOUNT HEADS
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories')->middleware('role:Finance,Admin,Super');
Route::post('/addcategory', [App\Http\Controllers\CategoriesController::class, 'store'])->name('addcategory')->middleware('role:Finance,Admin,Super');
Route::get('/delete-cat/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('delete-cat')->middleware('role:Super');

// TRANSACTIONS
Route::get('/transactions', [App\Http\Controllers\TransactionsController::class, 'index'])->name('transactions')->middleware('role:Finance,Admin,Super');
Route::post('/addtransaction', [App\Http\Controllers\TransactionsController::class, 'store'])->name('addtransaction')->middleware('role:Finance,Admin,Super');
Route::get('/delete-trans/{id}', [App\Http\Controllers\TransactionsController::class, 'destroy'])->name('delete-trans')->middleware('role:Finance,Super');
