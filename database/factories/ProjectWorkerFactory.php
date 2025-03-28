<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectWorker>
 */
class ProjectWorkerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'project_id' => Project::inRandomOrder()->first()->id,
      'worker_id' => Worker::inRandomOrder()->first()->id
    ];
  }
}
