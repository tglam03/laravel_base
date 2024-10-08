<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('customer',              [CustomerController::class, 'index'])->name('customers.index');
//Route::get('customer/create',       [CustomerController::class, 'create'])->name('customers.create');
//Route::post('customer/',        [CustomerController::class, 'store'])->name('customers.store');
//Route::get('customer/{customer}',         [CustomerController::class, 'show'])->name('customers.show');
//Route::get('customer/{customer}/edit',    [CustomerController::class, 'edit'])->name('customers.edit');
//Route::put('customer/{customer}',  [CustomerController::class, 'update'])->name('customers.update');
//Route::get('customer/{customer}/destroy', [CustomerController::class, 'destroy'])->name('customers.destroy');
//Route::get('customer/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])->name('customers.forceDestroy');


Route::resource('customers', CustomerController::class);

Route::delete('customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])
                            ->name('customers.forceDestroy');

Route::resource('students', StudentController::class);



