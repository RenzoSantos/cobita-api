<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnouncementController;  
use App\Http\Controllers\ActivityController;  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//AuthController
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/ShowTeacher', [AuthController::class, 'ShowTeacher']);
Route::get('/ShowStudent', [AuthController::class, 'ShowStudent']);
Route::get('/UserCount', [AuthController::class, 'UserCount']);
Route::put('/EditTeacher/{id}', [AuthController::class, 'EditTeacher']);
Route::post('/DestroyTeacher/{id}', [AuthController::class, 'DestroyTeacher']);

//Announcement
Route::post('/CreateAnnouncement', [AnnouncementController::class, 'CreateAnnouncement']);
Route::put('/EditAnnouncement/{id}', [AnnouncementController::class, 'EditAnnouncement']);
Route::get('/ShowAnnouncement', [AnnouncementController::class, 'ShowAnnouncement']);
Route::post('/DestroyAnnouncement/{id}', [AnnouncementController::class, 'DestroyAnnouncement']);

//Activity
Route::post('/CreateActivity', [ActivityController::class, 'CreateActivity']);
Route::put('/EditActivity/{id}', [ActivityController::class, 'EditActivity']);
Route::get('/ShowActivity', [ActivityController::class, 'ShowActivity']);
Route::post('/DestroyActivity/{id}', [ActivityController::class, 'DestroyActivity']);