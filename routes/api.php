<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewCategoryController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// add schedule
Route::post('/schedule/add',[ScheduleController::class,'add']);

// service
Route::get('/services/list', [ServiceController::class, 'list']);

// patient
Route::get('/patient/list/{phone}', [PatientController::class, 'list']);
Route::get('/patient/detail/{phone}/{patientId}', [PatientController::class, 'detail']);

// login
Route::post('/login', [AuthController::class, 'login']);

// change status schedule in listing
Route::post('schedule/change-status',[ScheduleController::class,'changeStatus'])->name('schedule.ajax.changestatus');

// new category
Route::get('/newCategory/list', [NewCategoryController::class, 'list']);

// news
Route::get('/news/list', [NewsController::class, 'list']);
Route::get('/news/detail/{newId}', [NewsController::class, 'detail']);
