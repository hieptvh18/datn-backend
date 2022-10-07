<?php

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


