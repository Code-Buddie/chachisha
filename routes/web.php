<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\ReportsController::class, 'index']);
Route::get('/cases', [\App\Http\Controllers\ReportsController::class, 'cases']);
Route::get('/methodology', [\App\Http\Controllers\ReportsController::class, 'methodology']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/details/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/guest/details/{id}', [App\Http\Controllers\ReportsController::class, 'show'])->name('guest-show');
Route::get('/add-case', [App\Http\Controllers\HomeController::class, 'addCase'])->name('add-case');
Route::get('/upload', [App\Http\Controllers\HomeController::class, 'requestUploadFile'])->name('upload');

Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

Route::get('/upload-excel', [\App\Http\Controllers\ReportsController::class, 'showExcelUploadForm']);
Route::post('/process-excel', [\App\Http\Controllers\ReportsController::class, 'processExcel'])->name('process.excel');
