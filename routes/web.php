<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admincontroller as ControllersAdmincontroller;
use App\Http\Controllers\courtcontroller;
use App\Http\Controllers\landingcontroller;
use App\Http\Controllers\registercaseController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');


// Route::get('/login', function () {
//     return redirect('/');
// });

Route::get('/login', [AuthController::class, 'loadLogin']);
Route::get('/', [landingcontroller::class, 'Landingpage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);








// ********** Admin Routes *********
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);

    Route::get('/users', [SuperAdminController::class, 'users'])->name('superAdminUsers');
    Route::get('/manage-role', [SuperAdminController::class, 'manageRole'])->name('manageRole');
    Route::post('/update-role', [SuperAdminController::class, 'updateRole'])->name('updateRole');
    Route::get('/hearing-date-admin', [admincontroller::class, 'hearingdateadmin'])->name('hearingdateadmin');
    Route::post('/hearing-view', [admincontroller::class, 'hearingadmin'])->name('hearingadmin');
    Route::post('/publish', [admincontroller::class, 'publish'])->name('publish');
    
});

// ********** Court Authirity Routes *********
Route::group(['prefix' => 'court', 'middleware' => ['web', 'isSubAdmin']], function () {
    Route::get('/dashboard', [SubAdminController::class, 'dashboardCourt'])->name('dashboardCourt');
    Route::get('/cause-list-date', [courtcontroller::class, 'causelistdate'])->name('causelistdate');
    Route::post('/cause-list-court', [courtcontroller::class, 'causelistcourt'])->name('causelistcourt');
    Route::get('/hearing-date', [courtcontroller::class, 'hearingdate'])->name('hearingdate');
    Route::post('/hearing-entry', [courtcontroller::class, 'hearingentry'])->name('hearingentry');
    Route::get('/hearing-entry-create/{assignbench_id}', [courtcontroller::class, 'hearingentrycreate'])->name('hearingentrycreate');
    Route::get('/hearing-entry-previous/{assignbench_id}', [courtcontroller::class, 'hearingentryprevious'])->name('hearingentryprevious');
    Route::post('/submit-hearing', [courtcontroller::class, 'submitHearing'])->name('submit.hearing');
});

// ********** Dealing Authirity Routes *********
Route::group(['prefix' => 'dealing', 'middleware' => ['web', 'isAdmin']], function () {
    Route::get('/dashboard', [registercaseController::class, 'dashboardDealing'])->name('dashboardDealing');
    Route::get('/register-case', [registercaseController::class, 'registercase'])->name('registercase');
    Route::post('/register-case', [registercaseController::class, 'storecase'])->name('store.data');
    Route::get('/all-case', [registercaseController::class, 'allcase'])->name('allcase');
    Route::get('/approved-case', [registercaseController::class, 'approvedlist'])->name('approvedlist');
    Route::get('/reject-case', [registercaseController::class, 'rejectedlist'])->name('rejectedlist');
    Route::post('/approve-case/{id}', [registercaseController::class, 'approveCase'])->name('approveCase');
    Route::post('/reject-case/{id}', [registercaseController::class, 'rejectCase'])->name('rejectCase');
    Route::get('/assign-bench-form', [registercaseController::class, 'Assignbenchform'])->name('assignbechform');
    Route::post('/assign-bench', [registercaseController::class, 'assignBench'])->name('assignBench');
    Route::get('/cause-list-date', [registercaseController::class, 'causelist'])->name('causelist');
    Route::post('/showCaseList', [registercaseController::class, 'showcauselist'])->name('showcauselist');
});

// ********** User Routes *********
Route::group(['middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
});
