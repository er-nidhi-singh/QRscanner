<?php

use App\Http\Controllers\app\QrController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MasterDateController;
use App\Http\Controllers\UserDataController;

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
Route::get('/', function () { return view('qrapp.scanner'); });


Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register']);

Route::get('password/forget',  function () { 
	return view('pages.forgot-password'); 
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	// Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route  
	Route::get('/dashboard', function () { 
		return view('pages.dashboard'); 
	})->name('dashboard');

Route::get('userdata-list', [UserDataController::class,'index']);
Route::get('userdata-delete/{id}', [UserDataController::class, 'destroy']);

Route::get('user-list', [UserController::class,'index']);
Route::get('user-delete/{id}', [UserController::class,'User_Delete']);



Route::get('master', [MasterDateController::class,'create']);
Route::post('master-store', [MasterDateController::class,'store']);
Route::get('master-list', [MasterDateController::class,'index']);

Route::get('bulk-master', [MasterDateController::class, 'bulk_master']);
Route::post('master_import', [MasterDateController::class, 'master_import']);



	Route::post('scanner', [QrController::class, 'scanner']);

	Route::get('form/view', [QrController::class, 'formView'])->name('app.form.view');
	Route::post('qrform/save/', [QrController::class, 'formSave'])->name('app.form.save');

	Route::get('verifyQr/', [QrController::class, 'verifyQr'])->name('app.qr.verify');








