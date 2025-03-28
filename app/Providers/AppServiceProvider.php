<?php

namespace App\Providers;

use App\Events\Worker\CreatedEvent;
use App\Listeners\Worker\CreateProfileListner;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // Event::listen(
    //   events: CreatedEvent::class,
    //   listener: CreateProfileListner::class,
    // );
    // TODO регистрируем в ручную 
  }
}
