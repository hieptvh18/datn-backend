<?php

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Dashboard\ServiceController;
use App\Http\Controllers\Backend\Schedule\ScheduleController;
use App\Http\Controllers\Specialist\SpecialistController;
use Illuminate\Support\Facades\Route;

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

// =========== route admin
Route::prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

    // schedules
    Route::get('schedules',[ScheduleController::class,'index'])->name('schedules.index');
    Route::get('schedules/add',[ScheduleController::class,'create'])->name('schedules.create');
    
    //chuyen khoa
    Route::get('specialist',[SpecialistController::class,'index'])->name('specialist.index');
    Route::get('specialist/add',[SpecialistController::class,'add'])->name('specialist.add');
    Route::post('specialist/add',[SpecialistController::class,'save'])->name('specialist.save');
    Route::get('specialist/edit/{id}',[SpecialistController::class,'edit'])->name('specialist.edit');
    Route::put('specialist/edit/{id}',[SpecialistController::class,'update'])->name('specialist.update');
    Route::delete('specialist/delete/{id}',[SpecialistController::class,'delete'])->name('specialist.delete');

    
    // schedules
    Route::get('schedules',[ScheduleController::class,'index'])->name('schedules.index');
    Route::get('schedules/create',[ScheduleController::class,'create'])->name('schedules.create');

    //service
    Route::resource('service', ServiceController::class)->except('show');

});
