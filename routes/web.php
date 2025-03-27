<?php

use App\Http\Controllers\WorkerController;
use App\Models\Worker;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});
Route::get(uri: 'workers', action: [WorkerController::class, 'index'])->name('worker.index');
Route::get('workers/create', [WorkerController::class, 'create'])->name('worker.create');
Route::get('workers/{worker}', [WorkerController::class, 'show'])->name('worker.show');
Route::post('workers', [WorkerController::class, 'store'])->name('worker.store');
Route::get('workers/{worker}/edit', [WorkerController::class, 'edit'])->name('worker.edit');
Route::patch('workers/{worker}', [WorkerController::class, 'update'])->name('worker.update');
Route::delete('workers/{worker}', [WorkerController::class, 'delete'])->name('worker.delete');


// crud - create read update delete
// название action:
/*
index show create store edit update delete
*/