<?php

use App\Console\Commands\DevCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

app(Schedule::class)->command('develop')->everySecond();
