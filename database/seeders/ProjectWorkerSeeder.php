<?php

namespace Database\Seeders;

use App\Models\ProjectWorker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    ProjectWorker::factory(10)->create();
    }
}
