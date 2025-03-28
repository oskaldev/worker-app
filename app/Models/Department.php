<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Department extends Model
{
  use HasFactory;
  protected $table = 'departments';
  // protected $fillable = [];
  protected $guarded = false;

  public function boss(): HasOneThrough
  {
    return $this->hasOneThrough(Worker::class, Position::class)
      ->where('position_id', 5);
  }
  public function workers(): HasManyThrough
  {
    return $this->hasManyThrough(Worker::class, Position::class);
  }
}
