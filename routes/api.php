<?php

use App\Http\Controllers\API\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//   return $request->user();
// })->middleware('auth');

Route::get('workers', [WorkerController::class, 'index']);
Route::get('workers/{worker}', [WorkerController::class, 'show']);
Route::post('workers', [WorkerController::class, 'store']);
Route::patch('workers/{worker}', [WorkerController::class, 'update']);
Route::delete('workers/{worker}', [WorkerController::class, 'destroy']);
