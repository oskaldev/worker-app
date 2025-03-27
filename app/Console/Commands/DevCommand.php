<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'develop';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Some develops';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    // $this->prepareData();

    // $profile = Profile::where('worker_id', $worker->id)->first();

    // $worker = Worker::find(2);
    // $profile = Profile::find(1);

    // dd($profile->worker->toArray());
    $worker = Worker::find(2);
    $position = Position::find(2);
    dd($position->workers->toArray());
  }
  public function prepareData()
  {
    $position1 = Position::create([
      'title' => 'Developer',
    ]);
    $position2 = Position::create([
      'title' => 'Manager',
    ]);

    $workerData1 = [
      'name' => 'Иван',
      'surname' => 'Иванов',
      'email' => 'ivan@mail.ru',
      'position_id' => $position1->id,
      'age' => 29,
      'description' => 'some descr',
      'is_married' => false,
    ];
    $workerData2 = [
      'name' => 'Caral',
      'surname' => 'Иванов',
      'email' => 'ivan@mail.ru',
      'position_id' => $position2->id,
      'age' => 29,
      'description' => 'some descr',
      'is_married' => true,
    ];
    $workerData3 = [
      'name' => 'Den',
      'surname' => 'Иванов',
      'email' => 'ivan@mail.ru',
      'position_id' => $position2->id,
      'age' => 29,
      'description' => 'some descr',
      'is_married' => true,
    ];
    $worker1 = Worker::create($workerData1);
    $worker2 = Worker::create($workerData2);
    $worker3 = Worker::create($workerData3);
    $profileData1 = [
      'worker_id' => $worker1->id,
      'city' => 'Ростов',
      'skill' => 'Coder',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData2 = [
      'worker_id' => $worker2->id,
      'city' => 'Ottawa',
      'skill' => 'Boss',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData3 = [
      'worker_id' => $worker3->id,
      'city' => 'Oslo',
      'skill' => 'developer',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];

    Profile::create($profileData1);
    Profile::create($profileData2);
    Profile::create($profileData3);
  }
}
