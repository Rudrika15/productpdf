<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('student',[StudentController::class,'index'])->name('student.index');
Route::get('student/create',[StudentController::class,'create'])->name('student.create');
Route::post('student/store',[StudentController::class,'store'])->name('student.store');
Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('student/update',[StudentController::class,'update'])->name('student.update');
Route::get('student/destroy/{id}',[StudentController::class,'destroy'])->name('student.destroy');
