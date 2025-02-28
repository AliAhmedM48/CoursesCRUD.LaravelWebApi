<?php

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/courses', [CourseController::class, 'getAll']);
Route::get('/courses/{id}', [CourseController::class, 'getOne']);
Route::post('/courses', [CourseController::class, 'createCourse']);
Route::patch('/courses/{id}', [CourseController::class, 'updateCourse']);
Route::delete('/courses/{id}', [CourseController::class, 'deleteCourse']);
