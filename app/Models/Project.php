<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
  protected $table = 'projects';
  // protected $fillable = [];
  protected $guarded = false;

  public function workers(): BelongsToMany
  {
    return $this->belongsToMany(Worker::class, 'project_workers', 'project_id', 'worker_id');
  }
}
