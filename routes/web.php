<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/admin/login', [HomeController::class, 'Login'])->name('login');
Route::post('/login', [HomeController::class, 'LoginStore'])->name('loginstore');
Route::post('/logout',[HomeController::class,'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// User routes
Route::get('/users', [UserController::class, 'Users'])->name('users');
Route::get('/users/create', [UserController::class, 'UserCreate'])->name('users.create');
Route::post('/users', [UserController::class, 'UserStore'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'UserDestroy'])->name('users.destroy');

// Category
Route::get('category',[CategoryController::class,'Category'])->name('category');
Route::get('category/create',[CategoryController::class,'CategoryCreate'])->name('category.create');
Route::post('category',[CategoryController::class,'CategoryStore'])->name('category.store');
Route::get('category/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
Route::put('category/update/{id}',[CategoryController::class,'CategoryUpdate'])->name('category.update');
Route::delete('category/delete/{id}',[CategoryController::class,'CategoryDestroy'])->name('category.destroy');

// Service
Route::get('service',[ServiceController::class,'Service'])->name('service');
Route::get('service/create',[ServiceController::class,'ServiceCreate'])->name('service.create');
Route::post('service/store',[ServiceController::class,'ServiceStore'])->name('service.store');
Route::get('service/edit/{id}',[ServiceController::class,'ServiceEdit'])->name('service.edit');
Route::put('service/update/{id}',[ServiceController::class,'ServiceUpdate'])->name('service.update');
Route::delete('service/delete/{id}',[ServiceController::class,'ServiceDestroy'])->name('service.destroy');

