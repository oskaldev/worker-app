<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\FilterRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WorkerController extends Controller
{
  use AuthorizesRequests;
  public function index(FilterRequest $request)
  {
    // $workers = Worker::all();
    $data = $request->validated();
    $workerQuery = Worker::query();
    if (isset($data['name'])) {
      $workerQuery->where('name', 'like', "%{$data['name']}%");
    }
    if (isset($data['surname'])) {
      $workerQuery->where('surname', 'like', "%{$data['surname']}%");
    }
    if (isset($data['email'])) {
      $workerQuery->where('email', 'like', "%{$data['email']}%");
    }
    if (isset($data['from'])) {
      $workerQuery->where('age', '>', $data['from']);
    }
    if (isset($data['to'])) {
      $workerQuery->where('age', '<', $data['to']);
    }
    if (isset($data['desription'])) {
      $workerQuery->where('desription', 'like', "%{$data['desription']}%");
    }
    if (isset($data['is_married'])) {
      $workerQuery->where('is_married', true);
    }
    $workers = $workerQuery->paginate(4);



    return view('worker.index', compact('workers'));
  }
  public function show(Worker $worker)
  {
    return view('worker.show', compact('worker'));
    // $worker = Worker::findOrNew($id);
    // $worker->new_ar = 'ara';
    // dd($worker->toArray());
    // return 'this is show worker controller !';
  }
  public function create()
  {
    Gate::authorize('create', Worker::class);
    return view('worker.create');
    // $worker = [
    //   'name' => 'Artem',
    //   'surname' => 'Kalnartem',
    //   'email' => 'kaln@mail.ru',
    //   'age' => 21,
    //   'description' => 'Im Artem',
    //   'is_married' => false,
    // ];
    // Worker::create($worker);
    // return 'Artem created';
  }
  public function store(StoreRequest $request)
  {
    // $this->authorize('create', Worker::class);
    Gate::authorize('create', Worker::class);
    $data = $request->validated();
    $data['is_married'] = isset($data['is_married']);
    Worker::create($data);
    return redirect()->route('workers.index');
  }
  public function edit(Worker $worker)
  {
    Gate::authorize('update', $worker);
    return view('worker.edit', compact('worker'));
  }
  public function update(UpdateRequest $request, Worker $worker)
  {
    Gate::authorize('update', $worker);
    $data = $request->validated();
    $data['is_married'] = isset($data['is_married']);
    $worker->update($data);
    return redirect()->route('workers.show', $worker->id);
    // $worker = Worker::whereIn('id', [9, 10, 11]);
    // $worker->name = 'Ivan';
    // $worker->surname = 'Ivan';
    // $worker->save();
    // $worker->update([
    //   'name' => 'Karal',
    //   'surname' => 'Petrov',
    //   'age' => 19
    // ]);
    // dd($worker->toArray());
    // return 'update';
  }
  public function destroy(Worker $worker)
  {
    Gate::authorize('delete', $worker);
    $worker->delete();
    return redirect()->route('workers.index');
  }
}
