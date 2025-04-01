<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function index()
  {
    $worker = Worker::all();
    // return response()->json([
    //   'data' => WorkerResource::collection($worker)
    // ]);
    return WorkerResource::collection(resource: $worker)
      ->additional([
        'status' => 'success',
        'message' => 'Список работников успешно получен'
      ]);
  }
  public function show(Worker $worker)
  {
    return WorkerResource::make(resource: $worker)->resolve();
    // return new WorkerResource($worker);
  }
}
