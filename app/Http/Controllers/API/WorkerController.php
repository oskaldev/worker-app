<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function index()
  {
    $worker = Worker::all();
    return response()->json([
      'data' => $worker
    ]);
  }
}
