<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
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



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');


Route::get('/', [AuthController::class, 'index'])->name('index')->middleware('auth');

// collab routes
Route::get('/collab', [AdminController::class, 'collab'])->name('collab')->middleware('auth');
Route::post('/collab/msg', [AdminController::class, 'CollabMsg'])->name('collab.msg')->middleware('auth');

// pagination
Route::get('/{pg}', [AdminController::class, 'IndexPagination'])->name('index.pg')->middleware('auth');
Route::get('/collab/{pg}', [AdminController::class, 'CollabPagination'])->name('collab.pg')->middleware('auth');

// search function
Route::get('/search/index', [AdminController::class, 'IndexSearch'])->name('index.search')->middleware('auth');
// Route::post('/search/collab', [AdminController::class, 'CollabSearch'])->name('collab.search')->middleware('auth');