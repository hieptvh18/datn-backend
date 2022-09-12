<?php

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Dashboard\ServiceController;
use App\Http\Controllers\Backend\Schedule\ScheduleController;
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

Route::get('/', function () {
    return view('welcome');
});


// =========== route admin
Route::prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    // schedules
    Route::get('schedules',[ScheduleController::class,'index'])->name('schedules.index');
    Route::get('schedules/create',[ScheduleController::class,'create'])->name('schedules.create');

    //service
    Route::resource('service', ServiceController::class)->except('show');
});
