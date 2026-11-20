<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// HOME PAGE
Route::get('/', function () {
    return view('welcome');
});

// STUDENT CRUD - RESOURCE ROUTE
Route::resource('students', StudentController::class);

// COURSE CRUD - RESOURCE ROUTE
Route::resource('courses', CourseController::class);
