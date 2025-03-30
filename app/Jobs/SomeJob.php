<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SomeJob implements ShouldQueue
{
  use Queueable;

  /**
   * Create a new job instance.
   */
  public function __construct()
  {
    //
  }

  /**
   * Execute the job.
   */
  public function handle(): void
  {
    /** @var string $text */
    $text = 'My text';

    /** @var int $number */
    $number = 101;
    dump($text . ' ' . $number);
    // dd(1111111);
  }
}
