<?php

namespace App\Listeners\Worker;

use App\Events\Worker\CreatedEvent;
use App\Models\Profile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateProfileListner
{
  /**
   * Create the event listener.
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   */
  public function handle(CreatedEvent $event)
  {
    Profile::create([
      'worker_id' => $event->worker->id
    ]);
  }
}
