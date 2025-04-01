<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\StoreRequest;
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
        'message' => 'Список работников успешно получен !'
      ]);
  }
  public function show(Worker $worker)
  {
    return WorkerResource::make(resource: $worker)->resolve();
    // return new WorkerResource($worker);
  }
  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    $data['is_married'] = isset($data['is_married']);
    $worker = Worker::create($data);
    return WorkerResource::make($worker)
      ->additional([
        'status' => 'success',
        'message' => 'Работник создан !'
      ]);
  }
  public function update(StoreRequest $request,  Worker $worker)
  {
    $data = $request->validated();
    $data['is_married'] = isset($data['is_married']);
    $worker->update($data);
    //!TODO важно fresh обязательно
    $worker->fresh();
    return WorkerResource::make($worker)
      ->additional([
        'status' => 'success',
        'message' => 'Работник изменён !'
      ]);
  }
  public function destroy(Worker $worker)
  {
    $worker->delete();
    return WorkerResource::make($worker)
      ->additional([
        'status' => 'success',
        'message' => 'Работник удалён !'
      ]);
  }
}
