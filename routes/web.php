<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-store',[ProductController::class,'store'])->name('product.store');
Route::get('product-edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('product-update',[ProductController::class,'update'])->name('product.update');
Route::get('product-destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');

Route::get('/dashboard',[ProductController::class,'dashboard'])->name('dashboard');
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category-create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category-update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category-destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

