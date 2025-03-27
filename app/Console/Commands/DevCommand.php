<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
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
    // $this->prepareManyToMany();

    $worker = Worker::find(1);
    $client = Client::find(1);

    $worker->reviews()->create([
      'text' => 'some text 1'
    ]);
    $worker->reviews()->create([
      'text' => 'some text 2'
    ]);
    $worker->reviews()->create([
      'text' => 'some text 3'
    ]);
    $client->reviews()->create([
      'text' => 'some text 1'
    ]);
    $client->reviews()->create([
      'text' => 'some text 2'
    ]);
    $client->reviews()->create([
      'text' => 'some text 3'
    ]);
    // $worker->avatar()->create([
    //   'path' => 'worker path'
    // ]);
    // $client->avatar()->create([
    //   'path' => 'client path'
    // ]);
    // $avatar = Avatar::find(4);
    // dd($avatar->avatarable->toArray());

    // $worker = Worker::find(1);
    dd($worker->reviews->toArray());

    // $depart = Department::find(2);
    // $position = Position::where('department_id', $depart->id)->where('title', 'Boss')->first();
    // $worker = Worker::where('position_id', $position->id)->first();
    // dd($depart->workers->toArray());

    // $project = Project::find(1);
    // $worker = Worker::find(2);
    // $worker1 = Worker::find(3);
    // $worker2 = Worker::find(4);
    // $project->workers()->attach($worker->id);
    // dd($worker->projects->pluck('title')->toArray());
    // $projectWorkers = ProjectWorker::where('project_id', $project1->id)->get();
    // $workerIds = $projectWorkers->pluck('worker_id')->toArray();
    // $workers = Worker::whereIn('id', $workerIds)->get();

    // $worker1 = Worker::find(4);
    // $projectWorkers = ProjectWorker::where('worker_id', $worker1->id)->get();
    // $workerIds = $projectWorkers->pluck('project_id')->toArray();
    // $projects = Project::whereIn('id', $workerIds)->get();
    // dd($projects->pluck('title')->toArray());
    // $profile = Profile::where('worker_id', $worker->id)->first();
    // $worker = Worker::find(2);
    // $position = Position::find(2);
    // dd($position->workers->toArray());
  }
  public function prepareData()
  {
    Client::create([
      'name' => 'Bob',
    ]);
    Client::create([
      'name' => 'Misha',
    ]);
    Client::create([
      'name' => 'Elena',
    ]);
    $department = Department::create([
      'title' => 'IT',
    ]);
    $department1 = Department::create([
      'title' => 'Testir',
    ]);

    $position1 = Position::create([
      'title' => 'Developer',
      'department_id' => $department->id
    ]);
    $position2 = Position::create([
      'title' => 'Manager',
      'department_id' => $department->id
    ]);
    $position3 = Position::create([
      'title' => 'Designer',
      'department_id' => $department->id
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
    $workerData4 = [
      'name' => 'Saha',
      'surname' => 'Иванов',
      'email' => 'ivan@mail.ru',
      'position_id' => $position3->id,
      'age' => 29,
      'description' => 'some descr',
      'is_married' => true,
    ];
    $workerData5 = [
      'name' => 'Misha',
      'surname' => 'Иванов',
      'email' => 'ivan@mail.ru',
      'position_id' => $position3->id,
      'age' => 29,
      'description' => 'some descr',
      'is_married' => true,
    ];

    $worker1 = Worker::create($workerData1);
    $worker2 = Worker::create($workerData2);
    $worker3 = Worker::create($workerData3);
    $worker4 = Worker::create($workerData4);
    $worker5 = Worker::create($workerData5);

    $profileData1 = [
      'city' => 'Ростов',
      'skill' => 'Coder',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData2 = [
      'city' => 'Ottawa',
      'skill' => 'Boss',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData3 = [
      'city' => 'Oslo',
      'skill' => 'developer',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData4 = [
      'city' => 'Oslo',
      'skill' => 'UI designer',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData5 = [
      'city' => 'Oslo',
      'skill' => 'UI designer',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];

    $worker1->profile()->create($profileData1);
    $worker2->profile()->create($profileData2);
    $worker3->profile()->create($profileData3);
    $worker4->profile()->create($profileData4);
    $worker5->profile()->create($profileData5);

    // Profile::create($profileData1);
    // Profile::create($profileData2);
    // Profile::create($profileData3);
    // Profile::create($profileData4);
    // Profile::create($profileData5);
  }
  public function prepareManyToMany()
  {
    $workerManager1 = Worker::find(2);
    $workerManager2 = Worker::find(3);
    $workerDeveloper = Worker::find(1);
    $workerDesigner1 = Worker::find(4);
    $workerDesigner2 = Worker::find(5);

    $project1 = Project::create([
      'title' => 'Shop',
    ]);
    $project2 = Project::create([
      'title' => 'Blog',
    ]);
    $project1->workers()->attach([
      $workerManager1->id,
      $workerDeveloper->id,
      $workerDesigner1->id,
    ]);
    $project2->workers()->attach([
      $workerManager2->id,
      $workerDeveloper->id,
      $workerDesigner2->id,
    ]);

    //   ProjectWorker::create([
    //     'project_id' => $project1->id,
    //     'worker_id' => $workerManager1->id
    //   ]);
    //   ProjectWorker::create([
    //     'project_id' => $project1->id,
    //     'worker_id' => $workerDeveloper->id
    //   ]);
    //   ProjectWorker::create([
    //     'project_id' => $project1->id,
    //     'worker_id' => $workerDesigner1->id
    //   ]);

    //   ProjectWorker::create([
    //     'project_id' => $project2->id,
    //     'worker_id' => $workerManager2->id
    //   ]);
    //   ProjectWorker::create([
    //     'project_id' => $project2->id,
    //     'worker_id' => $workerDeveloper->id
    //   ]);
    //   ProjectWorker::create([
    //     'project_id' => $project2->id,
    //     'worker_id' => $workerDesigner2->id
    //   ]);
  }
}
