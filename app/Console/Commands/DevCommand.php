<?php

namespace App\Console\Commands;

use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
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

    $depart = Department::find(1);
    // $position = Position::where('department_id', $depart->id)->where('title', 'Boss')->first();
    // $worker = Worker::where('position_id', $position->id)->first();
    dd($depart->Boss->toArray());



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
    $profileData4 = [
      'worker_id' => $worker4->id,
      'city' => 'Oslo',
      'skill' => 'UI designer',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];
    $profileData5 = [
      'worker_id' => $worker5->id,
      'city' => 'Oslo',
      'skill' => 'UI designer',
      'exper' => 6,
      'finished_study_at' => '2023.06.01'
    ];

    Profile::create($profileData1);
    Profile::create($profileData2);
    Profile::create($profileData3);
    Profile::create($profileData4);
    Profile::create($profileData5);
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

    ProjectWorker::create([
      'project_id' => $project1->id,
      'worker_id' => $workerManager1->id
    ]);
    ProjectWorker::create([
      'project_id' => $project1->id,
      'worker_id' => $workerDeveloper->id
    ]);
    ProjectWorker::create([
      'project_id' => $project1->id,
      'worker_id' => $workerDesigner1->id
    ]);

    ProjectWorker::create([
      'project_id' => $project2->id,
      'worker_id' => $workerManager2->id
    ]);
    ProjectWorker::create([
      'project_id' => $project2->id,
      'worker_id' => $workerDeveloper->id
    ]);
    ProjectWorker::create([
      'project_id' => $project2->id,
      'worker_id' => $workerDesigner2->id
    ]);
  }
}
