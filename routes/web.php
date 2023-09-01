<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\WebsiteController;
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

//Admin Routes
Route::get('/admin/login', [LoginController::class, 'login']);
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);

//Website Routes
Route::get('/', [WebsiteController::class, 'home']);
Route::get('/shop', [WebsiteController::class, 'shop']);
Route::get('/contact', [WebsiteController::class, 'contact']);

