<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/tasks',[TaskController::class,'tasks']);
Route::get('/get_task/{id}',[TaskController::class,'getTask']); 
Route::post('/add_task',[TaskController::class,'saveTask']);

Route::delete('/delete_task/{id}',[TaskController::class,'deleteTask']); 
Route::post('/update_task/{id}',[TaskController::class,'updateTask']); 