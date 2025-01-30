<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('upload','upload');
Route::post('upload',[UploadController::class,'upload']);


Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('/employee/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('/employee/edit{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('/employee/update',[EmployeeController::class,'update'])->name('employee.update');
Route::get('/employee/destroy{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');



Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('product/update',[ProductController::class,'update'])->name('product.update');
Route::get('product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');




Route::get('/item/index',[ItemController::class,'index'])->name('item.index');
Route::get('/item/create',[ItemController::class,'create'])->name('item.create');
Route::post('/item/store',[ItemController::class,'store'])->name('item.store');
Route::get('/item/edit/{id}',[ItemController::class,'edit'])->name('item.edit');
Route::post('item/update',[ItemController::class,'update'])->name('item.update');
Route::get('item/destroy/{id}',[ItemController::class,'destroy'])->name('item.destroy');
