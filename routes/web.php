<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProductsController;
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
Route::post('/admin/authenticate', [LoginController::class, 'authenticate']);
Route::get('/admin/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);

    //Categories Roues
    Route::get('/admin/categories', [CategoriesController::class, 'categories']);
    Route::get('/admin/categories/add', [CategoriesController::class, 'add']);
    Route::post('/admin/categories/add', [CategoriesController::class, 'create']);
    Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit']);
    Route::put('/admin/categories/edit/{id}', [CategoriesController::class, 'update']);
    Route::delete('/admin/categories/delete/{id}', [CategoriesController::class, 'delete']);

    //Products Route
    Route::resource('admin/products', ProductsController::class);

    //Profile
    Route::get('/admin/profile', [LoginController::class, 'profile']);
    Route::put('/admin/profile', [LoginController::class, 'updateProfile']);
});

//Website Routes
Route::get('/', [WebsiteController::class, 'home']);
Route::get('/shop', [WebsiteController::class, 'shop']);
Route::get('/contact', [WebsiteController::class, 'contact']);
