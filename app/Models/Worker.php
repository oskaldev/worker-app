<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Worker extends Model
{
  protected $table = 'workers';
  // protected $fillable = [];
  protected $guarded = false;

  public function profile(): HasOne
  {
    return $this->hasOne(Profile::class, 'worker_id', 'id');
  }
  public function position(): BelongsTo
  {
    return $this->belongsTo(Position::class, 'position_id', 'id');
  }
  public function projects(): BelongsToMany
  {
    return $this->belongsToMany(Project::class, 'project_workers', 'worker_id', 'project_id');
  }
}
