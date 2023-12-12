<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ExportController;
use App\Http\Controllers\admin\UserController;
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

// new user form
Route::get('/new', [AuthController::class, 'Usercreate'])->name('user.new')->middleware('auth');
Route::post('/new', [AuthController::class, 'UserCreateSubmit'])->name('user.new.submit')->middleware('auth');

// new Information record
Route::post('/new/info', [AdminController::class, 'NewInfo'])->name('new.info')->middleware('auth');
Route::get('/info/edit/{id}', [AdminController::class, 'InfoEdit'])->name('info.edit')->middleware('auth');
Route::post('/info/edit/submit', [AdminController::class, 'InfoEditSubmit'])->name('info.edit.submit')->middleware('auth');
Route::post('/info/delete', [AdminController::class, 'deleteItems'])->name('info.delete')->middleware('auth');

// collab routes
Route::get('/collab', [AdminController::class, 'collab'])->name('collab')->middleware('auth');
Route::post('/collab/msg', [AdminController::class, 'CollabMsg'])->name('collab.msg')->middleware('auth');

// pagination
Route::get('/{pg}', [AdminController::class, 'IndexPagination'])->name('index.pg')->middleware('auth');
Route::get('/collab/{pg}', [AdminController::class, 'CollabPagination'])->name('collab.pg')->middleware('auth');

// print page
Route::post('/print', [AdminController::class, 'PrintPage'])->name('print')->middleware('auth');
Route::get('/print/all', [AdminController::class, 'PrintPageAll'])->name('print.all')->middleware('auth');
Route::post('/print/page', [AdminController::class, 'PrintThisPage'])->name('print.page')->middleware('auth');
Route::get('/print/user/all', [UserController::class, 'PrintUserAll'])->name('print.user.all')->middleware('auth');
Route::post('print/collab', [AdminController::class, 'PrintCollab'])->name('print.collab')->middleware('auth');
Route::get('print/collab/all', [AdminController::class, 'PrintCollabAll'])->name('print.collab.all')->middleware('auth');

// sorting routes
Route::get('/dateModification/{sort}', [AdminController::class, 'SortDateModification'])->name('dateModification')->middleware('auth');
Route::get('/stato/{sort}', [AdminController::class, 'SortStato'])->name('stato')->middleware('auth');
Route::get('/Richiedente/{sort}', [AdminController::class, 'SortRichiedente'])->name('richiedente')->middleware('auth');

// search function
Route::get('/search/index', [AdminController::class, 'IndexSearch'])->name('index.search')->middleware('auth');
Route::get('/search/collab', [UserController::class, 'CollabSearch'])->name('collab.search')->middleware('auth');
Route::get('search/collab/admin', [AdminController::class, 'collabSearchAdmin'])->name('collab.search.admin')->middleware('auth');
Route::get('/search/advance', [AdminController::class, 'AdvanceSearch'])->name('search.advance')->middleware('auth');

//password
Route::get('/password/change/{uid}', [AdminController::class, 'PasswordChange'])->name('password.change');
Route::get('/password/Forgot/change/{uid}', [AuthController::class, 'passwordForgotChange'] )->name('password.forgot.change');
Route::post('/password/change/submit', [AdminController::class, 'PasswordChangeSubmit'])->name('password.change.submit');
Route::get('/password/forgot', [AuthController::class, 'ForgotPassword'])->name('password.forgot');
Route::post('/password/forgot/submit', [AuthController::class, 'ForgotPasswordSubmit'])->name('password.forgot.submit');

// import routes
Route::get('/import/document', [ExportController::class, 'ImportDocument'])->name('import.document')->middleware('auth');
Route::post('/import/submit' , [ExportController::class, 'ImportDocumentSubmit'])->name('import.submit')->middleware('auth');

// export paths
Route::post('export/select', [ExportController::class, 'ChooseExport'])->name('export.choose')->middleware('auth');
Route::post('export/select/submit', [ExportController::class, 'ChooseExportSubmit'])->name('export.choose.submit')->middleware('auth');


