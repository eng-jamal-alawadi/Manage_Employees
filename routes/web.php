<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('crudTemplet');
// });

//To get All employees data
Route::get('home',[EmployeesController::class,'index'])->name("index");

//Create & Store employees data
Route::get('create',[EmployeesController::class,'create'])->name("create");
Route::post('store',[EmployeesController::class,'store'])->name("store");

//Delete employees data
Route::get('delete/{id}',[EmployeesController::class,'delete'])->name('delete');

//Edit employees data
Route::get('edit/{id}',[EmployeesController::class,'edit'])->name('edit');
Route::put('edit/{id}',[EmployeesController::class,'update'])->name('update');
