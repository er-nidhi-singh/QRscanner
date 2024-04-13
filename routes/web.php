<?php

use App\Http\Controllers\app\QrController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterDateController;

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


	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route  
	Route::get('/dashboard', function () { 
		return view('pages.dashboard'); 
	})->name('dashboard');

	Route::get('master-list',[MasterDateController::class, 'create']);
	Route::post('master-store',[MasterDateController::class, 'store']);
	Route::get('master-list',[MasterDateController::class, 'index']);

	Route::get('bulk-master', [MasterDateController::class, 'bulk_master']);
    Route::post('master_import', [MasterDateController::class, 'master_import']);



	Route::post('scanner', [QrController::class, 'scanner']);

	Route::get('form/view', [QrController::class, 'formView'])->name('app.form.view');
	Route::post('qrform/save/', [QrController::class, 'formSave'])->name('app.form.save');

	Route::get('verifyQr/', [QrController::class, 'verifyQr'])->name('app.qr.verify');








